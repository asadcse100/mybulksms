<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageInfo;
use App\Models\Message;
use App\Models\MasterNumber;
use App\Models\NumberList;
use App\Models\AllLead;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
use Flash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function resetServer(){
        $user_id = Auth::user()->id;
        $allLeads = new AllLead;
        $segment = \Request::segment(2);
        $leadsData = MessageInfo::where('user_id', $user_id)->where('status', 3)->get();
        // dd($leadsData);
        foreach($leadsData as $lead){
            $insertData[] = [
                'user_id' => $lead->user_id,
                'email' => $lead->email
            ];
        }
        if(!empty($insertData)){
            AllLead::insertOrIgnore($insertData);
        }
        
        Message::where('user_id', $user_id)->update(['sms_hit' => 0]);
        if($segment == 'master'){
            MessageInfo::where('user_id', $user_id)->delete();
        }else{
            MessageInfo::where('user_id', $user_id)->where('status', 3)->delete();
        }
        
        Flash::success('Server Reset successfully.');
        return redirect(route('messageInfos.index'));
    }


}
