<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSMTPAPIRequest;
use App\Http\Requests\API\UpdateSMTPAPIRequest;
use App\Models\SMTP;
use App\Repositories\SMTPRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SMTPController
 * @package App\Http\Controllers\API
 */

class SMTPAPIController extends AppBaseController
{
    /** @var  SMTPRepository */
    private $sMTPRepository;

    public function __construct(SMTPRepository $sMTPRepo)
    {
        $this->sMTPRepository = $sMTPRepo;
    }

    /**
     * Display a listing of the SMTP.
     * GET|HEAD /sMTPS
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sMTPS = $this->sMTPRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sMTPS->toArray(), 'S M T P S retrieved successfully');
    }

    /**
     * Store a newly created SMTP in storage.
     * POST /sMTPS
     *
     * @param CreateSMTPAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSMTPAPIRequest $request)
    {
        $input = $request->all();

        $sMTP = $this->sMTPRepository->create($input);

        return $this->sendResponse($sMTP->toArray(), 'S M T P saved successfully');
    }

    /**
     * Display the specified SMTP.
     * GET|HEAD /sMTPS/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SMTP $sMTP */
        $sMTP = $this->sMTPRepository->find($id);

        if (empty($sMTP)) {
            return $this->sendError('S M T P not found');
        }

        return $this->sendResponse($sMTP->toArray(), 'S M T P retrieved successfully');
    }

    /**
     * Update the specified SMTP in storage.
     * PUT/PATCH /sMTPS/{id}
     *
     * @param int $id
     * @param UpdateSMTPAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSMTPAPIRequest $request)
    {
        $input = $request->all();

        /** @var SMTP $sMTP */
        $sMTP = $this->sMTPRepository->find($id);

        if (empty($sMTP)) {
            return $this->sendError('S M T P not found');
        }

        $sMTP = $this->sMTPRepository->update($input, $id);

        return $this->sendResponse($sMTP->toArray(), 'SMTP updated successfully');
    }

    /**
     * Remove the specified SMTP from storage.
     * DELETE /sMTPS/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SMTP $sMTP */
        $sMTP = $this->sMTPRepository->find($id);

        if (empty($sMTP)) {
            return $this->sendError('S M T P not found');
        }

        $sMTP->delete();

        return $this->sendSuccess('S M T P deleted successfully');
    }
}
