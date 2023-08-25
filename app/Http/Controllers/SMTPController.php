<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSMTPRequest;
use App\Http\Requests\UpdateSMTPRequest;
use App\Repositories\SMTPRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SMTP;
use Flash;
use Response;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SmtpImport;

class SMTPController extends AppBaseController
{
    /** @var  SMTPRepository */
    private $sMTPRepository;

    public function __construct(SMTPRepository $sMTPRepo)
    {
        $this->sMTPRepository = $sMTPRepo;
    }

    /**
     * Display a listing of the SMTP.
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
            $sMTPS = $this->sMTPRepository->paginate(30);
            $user = User::get()->toArray();
            return view('s_m_t_p_s.index', compact('sMTPS', 'user'));
        }else{
            $sMTPS = SMTP::where('user_id', $user_id)->paginate(30);
            return view('s_m_t_p_s.index', compact('sMTPS'));
        }

        // $sMTPS = $this->sMTPRepository->paginate(30);
        
        
    }

    /**
     * Show the form for creating a new SMTP.
     *
     * @return Response
     */
    public function create()
    {
        return view('s_m_t_p_s.create');
    }

    /**
     * Show the form for creating a new SMTP.
     *
     * @return Response
     */
    public function smtpEport()
    {
        return view('s_m_t_p_s.emport');
    }

    /**
     * Store a newly created SMTP in storage.
     *
     * @param CreateSMTPRequest $request
     *
     * @return Response
     */
    public function store(CreateSMTPRequest $request)
    {
        $input = $request->all();

        $sMTP = $this->sMTPRepository->create($input);

        Flash::success('S M T P saved successfully.');

        return redirect(route('sMTPS.index'));
    }

    /**
     * emport_store a newly created SMTP in storage.
     *
     * @param CreateSMTPRequest $request
     *
     * @return Response
     */
    public function emport_store(CreateSMTPRequest $request)
    {

        Excel::import(new SMTP, $request->importsmtpserver);
        return back();
  
    }


    /**
     * Display the specified SMTP.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sMTP = $this->sMTPRepository->find($id);

        if (empty($sMTP)) {
            Flash::error('S M T P not found');

            return redirect(route('sMTPS.index'));
        }

        return view('s_m_t_p_s.show')->with('sMTP', $sMTP);
    }

    /**
     * Show the form for editing the specified SMTP.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sMTP = $this->sMTPRepository->find($id);

        if (empty($sMTP)) {
            Flash::error('S M T P not found');

            return redirect(route('sMTPS.index'));
        }

        return view('s_m_t_p_s.edit')->with('sMTP', $sMTP);
    }

    /**
     * Update the specified SMTP in storage.
     *
     * @param int $id
     * @param UpdateSMTPRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSMTPRequest $request)
    {
        $sMTP = $this->sMTPRepository->find($id);

        if (empty($sMTP)) {
            Flash::error('S M T P not found');

            return redirect(route('sMTPS.index'));
        }

        $sMTP = $this->sMTPRepository->update($request->all(), $id);

        Flash::success('S M T P updated successfully.');

        return redirect(route('sMTPS.index'));
    }

    /**
     * Remove the specified SMTP from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sMTP = $this->sMTPRepository->find($id);

        if (empty($sMTP)) {
            Flash::error('S M T P not found');

            return redirect(route('sMTPS.index'));
        }

        $this->sMTPRepository->delete($id);

        Flash::success('S M T P deleted successfully.');

        return redirect(route('sMTPS.index'));
    }
}
