<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetopupRequest;
use App\Http\Requests\UpdatetopupRequest;
use App\Repositories\topupRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topup;
use Flash;
use Response;

class topupController extends AppBaseController
{
    /** @var  topupRepository */
    private $topupRepository;

    public function __construct(topupRepository $topupRepo)
    {
        $this->topupRepository = $topupRepo;
    }

    /**
     * Display a listing of the topup.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $topups = $this->topupRepository->paginate(10);
        $user = User::get()->toArray();
        return view('topups.index', compact('topups', 'user'));
    }

    /**
     * Show the form for creating a new topup.
     *
     * @return Response
     */
    public function create()
    {
        $user = User::get()->toArray();
        return view('topups.create', compact('user'));
    }

    /**
     * Store a newly created topup in storage.
     *
     * @param CreatetopupRequest $request
     *
     * @return Response
     */
    public function store(CreatetopupRequest $request)
    {
        $input = $request->all();

        $topupData = Topup::where('customer_id', $input['customer_id'])->get()->toArray();
        
        if(!empty($topupData)){
            $updateSmsLimit = $topupData[0]['smslimit'] + $input['smslimit'];
            if(strtotime($input['exptime']) > strtotime($topupData[0]['exptime'])){
                topup::where('id', $topupData[0]['id'])->update(['smslimit' => $updateSmsLimit]);
                topup::where('id', $topupData[0]['id'])->update(['exptime' => $input['exptime']]);

                Flash::success('Topup TEST Update successfully.');
            }else{
                topup::where('id', $topupData[0]['id'])->update(['smslimit' => $updateSmsLimit]);

                Flash::success('Topup Update successfully.');
            }
            
        }else{
            $topup = $this->topupRepository->create($input);

            Flash::success('Topup saved successfully.');
        }
        
        return redirect(route('topups.index'));
    }

    /**
     * Display the specified topup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $topup = $this->topupRepository->find($id);

        if (empty($topup)) {
            Flash::error('Topup not found');

            return redirect(route('topups.index'));
        }

        return view('topups.show')->with('topup', $topup);
    }

    /**
     * Show the form for editing the specified topup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $topup = $this->topupRepository->find($id);
        $user = User::get()->toArray();
        if (empty($topup)) {
            Flash::error('Topup not found');

            return redirect(route('topups.index'));
        }

        return view('topups.edit', compact('topup', 'user'));
    }

    /**
     * Update the specified topup in storage.
     *
     * @param int $id
     * @param UpdatetopupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetopupRequest $request)
    {
        $topup = $this->topupRepository->find($id);

        if (empty($topup)) {
            Flash::error('Topup not found');

            return redirect(route('topups.index'));
        }

        $topup = $this->topupRepository->update($request->all(), $id);

        Flash::success('Topup updated successfully.');

        return redirect(route('topups.index'));
    }

    /**
     * Remove the specified topup from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $topup = $this->topupRepository->find($id);

        if (empty($topup)) {
            Flash::error('Topup not found');

            return redirect(route('topups.index'));
        }

        $this->topupRepository->delete($id);

        Flash::success('Topup deleted successfully.');

        return redirect(route('topups.index'));
    }
}
