<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMasterNumberAPIRequest;
use App\Http\Requests\API\UpdateMasterNumberAPIRequest;
use App\Models\MasterNumber;
use App\Repositories\MasterNumberRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MasterNumberController
 * @package App\Http\Controllers\API
 */

class MasterNumberAPIController extends AppBaseController
{
    /** @var  MasterNumberRepository */
    private $masterNumberRepository;

    public function __construct(MasterNumberRepository $masterNumberRepo)
    {
        $this->masterNumberRepository = $masterNumberRepo;
    }

    /**
     * Display a listing of the MasterNumber.
     * GET|HEAD /masterNumbers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $masterNumbers = $this->masterNumberRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($masterNumbers->toArray(), 'Master Numbers retrieved successfully');
    }

    /**
     * Store a newly created MasterNumber in storage.
     * POST /masterNumbers
     *
     * @param CreateMasterNumberAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterNumberAPIRequest $request)
    {
        $input = $request->all();

        $masterNumber = $this->masterNumberRepository->create($input);

        return $this->sendResponse($masterNumber->toArray(), 'Master Number saved successfully');
    }

    /**
     * Display the specified MasterNumber.
     * GET|HEAD /masterNumbers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MasterNumber $masterNumber */
        $masterNumber = $this->masterNumberRepository->find($id);

        if (empty($masterNumber)) {
            return $this->sendError('Master Number not found');
        }

        return $this->sendResponse($masterNumber->toArray(), 'Master Number retrieved successfully');
    }

    /**
     * Update the specified MasterNumber in storage.
     * PUT/PATCH /masterNumbers/{id}
     *
     * @param int $id
     * @param UpdateMasterNumberAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterNumberAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterNumber $masterNumber */
        $masterNumber = $this->masterNumberRepository->find($id);

        if (empty($masterNumber)) {
            return $this->sendError('Master Number not found');
        }

        $masterNumber = $this->masterNumberRepository->update($input, $id);

        return $this->sendResponse($masterNumber->toArray(), 'MasterNumber updated successfully');
    }

    /**
     * Remove the specified MasterNumber from storage.
     * DELETE /masterNumbers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MasterNumber $masterNumber */
        $masterNumber = $this->masterNumberRepository->find($id);

        if (empty($masterNumber)) {
            return $this->sendError('Master Number not found');
        }

        $masterNumber->delete();

        return $this->sendSuccess('Master Number deleted successfully');
    }
}
