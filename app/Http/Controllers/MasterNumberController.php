<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMasterNumberRequest;
use App\Http\Requests\UpdateMasterNumberRequest;
use App\Repositories\MasterNumberRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Country;
use App\Models\User;

class MasterNumberController extends AppBaseController
{
    /** @var  MasterNumberRepository */
    private $masterNumberRepository;

    public function __construct(MasterNumberRepository $masterNumberRepo)
    {
        $this->masterNumberRepository = $masterNumberRepo;
    }

    /**
     * Display a listing of the MasterNumber.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterNumbers = $this->masterNumberRepository->paginate(10);
        $country = Country::get()->toArray();
        $user = User::get()->toArray();
        return view('master_numbers.index', compact('masterNumbers', 'country', 'user'));
    }

    /**
     * Show the form for creating a new MasterNumber.
     *
     * @return Response
     */
    public function create()
    {
        $country = Country::get()->toArray();
        //dd($country);
        return view('master_numbers.create', compact('country'));
    }

    /**
     * Store a newly created MasterNumber in storage.
     *
     * @param CreateMasterNumberRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterNumberRequest $request)
    {
        $input = $request->all();
        // dd($input);
        $masterNumber = $this->masterNumberRepository->create($input);
        Flash::success('Master Number saved successfully.');
        return redirect(route('masterNumbers.index'));
    }

    /**
     * Display the specified MasterNumber.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterNumber = $this->masterNumberRepository->find($id);

        if (empty($masterNumber)) {
            Flash::error('Master Number not found');

            return redirect(route('masterNumbers.index'));
        }

        return view('master_numbers.show')->with('masterNumber', $masterNumber);
    }

    /**
     * Show the form for editing the specified MasterNumber.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterNumber = $this->masterNumberRepository->find($id);

        if (empty($masterNumber)) {
            Flash::error('Master Number not found');

            return redirect(route('masterNumbers.index'));
        }

        return view('master_numbers.edit')->with('masterNumber', $masterNumber);
    }

    /**
     * Update the specified MasterNumber in storage.
     *
     * @param int $id
     * @param UpdateMasterNumberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterNumberRequest $request)
    {
        $masterNumber = $this->masterNumberRepository->find($id);

        if (empty($masterNumber)) {
            Flash::error('Master Number not found');

            return redirect(route('masterNumbers.index'));
        }

        $masterNumber = $this->masterNumberRepository->update($request->all(), $id);

        Flash::success('Master Number updated successfully.');

        return redirect(route('masterNumbers.index'));
    }

    /**
     * Remove the specified MasterNumber from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterNumber = $this->masterNumberRepository->find($id);

        if (empty($masterNumber)) {
            Flash::error('Master Number not found');

            return redirect(route('masterNumbers.index'));
        }

        $this->masterNumberRepository->delete($id);

        Flash::success('Master Number deleted successfully.');

        return redirect(route('masterNumbers.index'));
    }
}
