<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetopupAPIRequest;
use App\Http\Requests\API\UpdatetopupAPIRequest;
use App\Models\topup;
use App\Repositories\topupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class topupController
 * @package App\Http\Controllers\API
 */

class topupAPIController extends AppBaseController
{
    /** @var  topupRepository */
    private $topupRepository;

    public function __construct(topupRepository $topupRepo)
    {
        $this->topupRepository = $topupRepo;
    }

    /**
     * Display a listing of the topup.
     * GET|HEAD /topups
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $topups = $this->topupRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($topups->toArray(), 'Topups retrieved successfully');
    }

    /**
     * Store a newly created topup in storage.
     * POST /topups
     *
     * @param CreatetopupAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetopupAPIRequest $request)
    {
        $input = $request->all();

        $topup = $this->topupRepository->create($input);

        return $this->sendResponse($topup->toArray(), 'Topup saved successfully');
    }

    /**
     * Display the specified topup.
     * GET|HEAD /topups/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var topup $topup */
        $topup = $this->topupRepository->find($id);

        if (empty($topup)) {
            return $this->sendError('Topup not found');
        }

        return $this->sendResponse($topup->toArray(), 'Topup retrieved successfully');
    }

    /**
     * Update the specified topup in storage.
     * PUT/PATCH /topups/{id}
     *
     * @param int $id
     * @param UpdatetopupAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetopupAPIRequest $request)
    {
        $input = $request->all();

        /** @var topup $topup */
        $topup = $this->topupRepository->find($id);

        if (empty($topup)) {
            return $this->sendError('Topup not found');
        }

        $topup = $this->topupRepository->update($input, $id);

        return $this->sendResponse($topup->toArray(), 'topup updated successfully');
    }

    /**
     * Remove the specified topup from storage.
     * DELETE /topups/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var topup $topup */
        $topup = $this->topupRepository->find($id);

        if (empty($topup)) {
            return $this->sendError('Topup not found');
        }

        $topup->delete();

        return $this->sendSuccess('Topup deleted successfully');
    }
}
