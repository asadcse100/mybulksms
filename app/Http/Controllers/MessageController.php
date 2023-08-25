<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Repositories\MessageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Flash;
use Response;
use App\Models\User;
use App\Models\Message;
use App\Models\Attachment;
use Auth;

class MessageController extends AppBaseController
{
    /** @var  MessageRepository */
    private $messageRepository;

    public function __construct(MessageRepository $messageRepo)
    {
        $this->messageRepository = $messageRepo;
    }

    /**
     * Display a listing of the Message.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        $messages = Message::with('attachment')->get()->toArray();
        $user = User::get()->toArray();
        // dd($messages);
        return view('messages.index', compact('messages', 'user'));
    }

    /**
     * Show the form for creating a new Message.
     *
     * @return Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created Message in storage.
     *
     * @param CreateMessageRequest $request
     *
     * @return Response
     */
    public function store(CreateMessageRequest $request)
    {
        $request->validate([
            'messagerotation' => 'required',
            'messageheader' => 'required',
            'messagebody' => 'required'
        ]);
        $user_id = Auth::id();
        $message = new Message;
        $message->user_id = $user_id;
        $message->messagerotation = $request->messagerotation;
        $message->messageheader = $request->messageheader;
        $message->messagebody = $request->messagebody;
        $message->save();

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');

            foreach($attachment as $image){
		$width = Image::make($image)->width();
		$height = Image::make($image)->height();

		if ($width > 1280 || $height > 720) {
		    $width = floor($width / 3);
		    $height = floor($height / 3);
		}

                $upload_image = time() .'_'. uniqid() .'.'. $image->getclientoriginalextension();
                // Image::make($image)->resize($width, $height)->save(public_path('panel/images/attachment/'. $upload_image));

		$img = Image::make($image)->orientate();
		$img->resize($width, $height, function($constraint){
    		    $constraint->upsize();
    		    $constraint->aspectRatio();
		});
		$img->save(public_path('img/'. $upload_image));

                Attachment::insert([
                    'message_id' =>  $message->id,
                    'attachment' => $upload_image
                ]);
            }
        }


        Flash::success('Message saved successfully.');

        return redirect(route('messages.index'));
    }

    /**
     * Display the specified Message.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        return view('messages.show')->with('message', $message);
    }

    /**
     * Show the form for editing the specified Message.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        return view('messages.edit')->with('message', $message);
    }

    /**
     * Update the specified Message in storage.
     *
     * @param int $id
     * @param UpdateMessageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMessageRequest $request)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        $message = $this->messageRepository->update($request->all(), $id);

        Flash::success('Message updated successfully.');

        return redirect(route('messages.index'));
    }

    /**
     * Remove the specified Message from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        $this->messageRepository->delete($id);

        Flash::success('Message deleted successfully.');

        return redirect(route('messages.index'));
    }
}
