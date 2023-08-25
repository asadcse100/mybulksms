<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateperMinSendAPIRequest;
use App\Http\Requests\API\UpdateperMinSendAPIRequest;
use App\Models\perMinSend;
use App\Repositories\perMinSendRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class perMinSendController
 * @package App\Http\Controllers\API
 */

class perMinSendAPIController extends AppBaseController
{
    /** @var  perMinSendRepository */
    private $perMinSendRepository;

    public function __construct(perMinSendRepository $perMinSendRepo)
    {
        $this->perMinSendRepository = $perMinSendRepo;
    }

    /**
     * Display a listing of the perMinSend.
     * GET|HEAD /perMinSends
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $perMinSends = $this->perMinSendRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($perMinSends->toArray(), 'Per Min Sends retrieved successfully');
    }

    /**
     * Store a newly created perMinSend in storage.
     * POST /perMinSends
     *
     * @param CreateperMinSendAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateperMinSendAPIRequest $request)
    {
        $input = $request->all();

        $perMinSend = $this->perMinSendRepository->create($input);

        return $this->sendResponse($perMinSend->toArray(), 'Per Min Send saved successfully');
    }

    /**
     * Display the specified perMinSend.
     * GET|HEAD /perMinSends/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var perMinSend $perMinSend */
        $perMinSend = $this->perMinSendRepository->find($id);

        if (empty($perMinSend)) {
            return $this->sendError('Per Min Send not found');
        }

        return $this->sendResponse($perMinSend->toArray(), 'Per Min Send retrieved successfully');
    }

    /**
     * Update the specified perMinSend in storage.
     * PUT/PATCH /perMinSends/{id}
     *
     * @param int $id
     * @param UpdateperMinSendAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateperMinSendAPIRequest $request)
    {
        $input = $request->all();

        /** @var perMinSend $perMinSend */
        $perMinSend = $this->perMinSendRepository->find($id);

        if (empty($perMinSend)) {
            return $this->sendError('Per Min Send not found');
        }

        $perMinSend = $this->perMinSendRepository->update($input, $id);

        return $this->sendResponse($perMinSend->toArray(), 'perMinSend updated successfully');
    }

    /**
     * Remove the specified perMinSend from storage.
     * DELETE /perMinSends/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var perMinSend $perMinSend */
        $perMinSend = $this->perMinSendRepository->find($id);

        if (empty($perMinSend)) {
            return $this->sendError('Per Min Send not found');
        }

        $perMinSend->delete();

        return $this->sendSuccess('Per Min Send deleted successfully');
    }
}
