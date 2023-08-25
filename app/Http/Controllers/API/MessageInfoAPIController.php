<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMessageInfoAPIRequest;
use App\Http\Requests\API\UpdateMessageInfoAPIRequest;
use App\Models\MessageInfo;
use App\Repositories\MessageInfoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MessageInfoController
 * @package App\Http\Controllers\API
 */

class MessageInfoAPIController extends AppBaseController
{
    /** @var  MessageInfoRepository */
    private $messageInfoRepository;

    public function __construct(MessageInfoRepository $messageInfoRepo)
    {
        $this->messageInfoRepository = $messageInfoRepo;
    }

    /**
     * Display a listing of the MessageInfo.
     * GET|HEAD /messageInfos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $messageInfos = $this->messageInfoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($messageInfos->toArray(), 'Message Infos retrieved successfully');
    }

    /**
     * Store a newly created MessageInfo in storage.
     * POST /messageInfos
     *
     * @param CreateMessageInfoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMessageInfoAPIRequest $request)
    {
        $input = $request->all();

        $messageInfo = $this->messageInfoRepository->create($input);

        return $this->sendResponse($messageInfo->toArray(), 'Message Info saved successfully');
    }

    /**
     * Display the specified MessageInfo.
     * GET|HEAD /messageInfos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MessageInfo $messageInfo */
        $messageInfo = $this->messageInfoRepository->find($id);

        if (empty($messageInfo)) {
            return $this->sendError('Message Info not found');
        }

        return $this->sendResponse($messageInfo->toArray(), 'Message Info retrieved successfully');
    }

    /**
     * Update the specified MessageInfo in storage.
     * PUT/PATCH /messageInfos/{id}
     *
     * @param int $id
     * @param UpdateMessageInfoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMessageInfoAPIRequest $request)
    {
        $input = $request->all();

        /** @var MessageInfo $messageInfo */
        $messageInfo = $this->messageInfoRepository->find($id);

        if (empty($messageInfo)) {
            return $this->sendError('Message Info not found');
        }

        $messageInfo = $this->messageInfoRepository->update($input, $id);

        return $this->sendResponse($messageInfo->toArray(), 'MessageInfo updated successfully');
    }

    /**
     * Remove the specified MessageInfo from storage.
     * DELETE /messageInfos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MessageInfo $messageInfo */
        $messageInfo = $this->messageInfoRepository->find($id);

        if (empty($messageInfo)) {
            return $this->sendError('Message Info not found');
        }

        $messageInfo->delete();

        return $this->sendSuccess('Message Info deleted successfully');
    }
}
