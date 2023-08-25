<?php

namespace App\Http\Controllers;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use App\Http\Requests\CreateMessageInfoRequest;
use App\Http\Requests\UpdateMessageInfoRequest;
use App\Repositories\MessageInfoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\MessageInfo;
use App\Models\MasterNumber;
use App\Models\Message;
use App\Models\Setting;
use App\Models\SMTP;
use App\Models\perMinSend;
use App\Models\Topup;
use App\Jobs\JobSms;
use Carbon\Carbon;
use App\Mail\sendEmail;
use Swift_Mailer;
use Swift_SmtpTransport;
use Swift_Message; 
use Flash;
use Response;
use DB;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LeadsImport;

class MessageInfoController extends AppBaseController
{
    /** @var  MessageInfoRepository */
    private $messageInfoRepository;

    public function __construct(MessageInfoRepository $messageInfoRepo)
    {
        $this->messageInfoRepository = $messageInfoRepo;
    }

    /**
     * Display a listing of the MessageInfo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::id();
        // dd($user_id);
        if($user_id == 1){
            // $messageInfos = $this->messageInfoRepository->paginate(30);
            $messageInfos = MessageInfo::orderBy('status', 'DESC')->paginate(30);
        }else{
            $messageInfos = MessageInfo::where('user_id', $user_id)->orderBy('status', 'DESC')->paginate(30);
        }
    
        //$messageInfos = MessageInfo::where('status', 0)->paginate(20);
        // dd($messageInfos->toArray());
        return view('message_infos.index')
            ->with('messageInfos', $messageInfos);
    }

    public function jobSms()
    {
        $JobSms = JobSms::handle();
        //dd($JobSms);
    }

    /**
     * Show the form for creating a new MessageInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('message_infos.create');
    }

    static function send()
    {
        //$user_id = Auth::id();
		$user_id = 1;
		// dd($user_id);
        $now = Carbon::now()->toArray();
		//dd($now);
        //Smae for database convert
        $now = strtotime($now['formatted']);
        //Get Data from Topup Table: customer_id, smslimit, exptime, perdaylimit
        $customerData = Topup::getCustomerId($user_id);
        $customer_id = $customerData[0]['customer_id'];
        $smslimit = $customerData[0]['smslimit'];
        $expTimes = strtotime($customerData[0]['exptime']);
        $month = gmdate( 'm', $expTimes ) - gmdate( 'm', $now );
        $day = gmdate( 'd', $expTimes ) - gmdate( 'd', $now );
        $perDayLimit = $customerData[0]['per_day_limit'];
        // Incompleted perday limit work
        $updated_at = $customerData[0]['updated_at'];

    if($smslimit > 0){
       if($month > 0 || $day > 0){
            $conver_num = MessageInfo::getSmsInfo($customer_id);
		   //dd($conver_num);
            shuffle($conver_num);
            $leads = count($conver_num);
            $cron = perMinSend::get()->toArray();
            $cronLimit = $cron[0]['perminsend'];

            if($leads > $cronLimit){
            
            if(isset($conver_num) && !empty($conver_num)){

                $i = 0;
				
            for($i = 0; $i < $cronLimit; $i++){
                $lead_email = $conver_num[0]['email'];
                
                 $smtp = SMTP::smtp($customer_id, $lead_email);
                    MessageInfo::where('id', $conver_num[$i]['id'])->update(['status' => 3]);                    
                    Topup::where('id', $customerData[0]['id'])->update(['smslimit' => $smslimit - $cronLimit], ['per_day_limit' => $perDayLimit - $cronLimit]);

                }
            }
            Flash::success('Message Info saved successfully.');
            }else{
                echo "No Leads Found! ";
            }
        }else{
            echo "Server Time End!!!";
        }
    }else{
        echo "No send Limit!!!";
    }
        return redirect(route('messageInfos.index'));
    }

     

    public function store(CreateMessageInfoRequest $request)
    {
        $input = $request->all();        
        $path = $request->file('email')->getRealPath();        

        $data = Excel::import(new LeadsImport, request()->file('email'));

        return redirect(route('messageInfos.index'));
        
    }

    /**
     * Display the specified MessageInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $messageInfo = $this->messageInfoRepository->find($id);

        if (empty($messageInfo)) {
            Flash::error('Message Info not found');

            return redirect(route('messageInfos.index'));
        }

        return view('message_infos.show')->with('messageInfo', $messageInfo);
    }

    /**
     * Show the form for editing the specified MessageInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $messageInfo = $this->messageInfoRepository->find($id);

        if (empty($messageInfo)) {
            Flash::error('Message Info not found');

            return redirect(route('messageInfos.index'));
        }

        return view('message_infos.edit')->with('messageInfo', $messageInfo);
    }

    /**
     * Update the specified MessageInfo in storage.
     *
     * @param int $id
     * @param UpdateMessageInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMessageInfoRequest $request)
    {
        $messageInfo = $this->messageInfoRepository->find($id);

        if (empty($messageInfo)) {
            Flash::error('Message Info not found');

            return redirect(route('messageInfos.index'));
        }

        $messageInfo = $this->messageInfoRepository->update($request->all(), $id);

        Flash::success('Message Info updated successfully.');

        return redirect(route('messageInfos.index'));
    }

    /**
     * Remove the specified MessageInfo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $messageInfo = $this->messageInfoRepository->find($id);

        if (empty($messageInfo)) {
            Flash::error('Message Info not found');

            return redirect(route('messageInfos.index'));
        }

        $this->messageInfoRepository->delete($id);

        Flash::success('Message Info deleted successfully.');

        return redirect(route('messageInfos.index'));
    }
}
