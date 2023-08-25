<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateperMinSendRequest;
use App\Http\Requests\UpdateperMinSendRequest;
use App\Repositories\perMinSendRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\User;

class perMinSendController extends AppBaseController
{
    /** @var  perMinSendRepository */
    private $perMinSendRepository;

    public function __construct(perMinSendRepository $perMinSendRepo)
    {
        $this->perMinSendRepository = $perMinSendRepo;
    }

    /**
     * Display a listing of the perMinSend.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perMinSends = $this->perMinSendRepository->paginate(10);
        $user = User::get()->toArray();
        return view('per_min_sends.index', compact('perMinSends', 'user'));
    }

    /**
     * Show the form for creating a new perMinSend.
     *
     * @return Response
     */
    public function create()
    {
        return view('per_min_sends.create');
    }

    /**
     * Store a newly created perMinSend in storage.
     *
     * @param CreateperMinSendRequest $request
     *
     * @return Response
     */
    public function store(CreateperMinSendRequest $request)
    {
        $input = $request->all();

        $perMinSend = $this->perMinSendRepository->create($input);

        Flash::success('Per Min Send saved successfully.');

        return redirect(route('perMinSends.index'));
    }

    /**
     * Display the specified perMinSend.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perMinSend = $this->perMinSendRepository->find($id);

        if (empty($perMinSend)) {
            Flash::error('Per Min Send not found');

            return redirect(route('perMinSends.index'));
        }

        return view('per_min_sends.show')->with('perMinSend', $perMinSend);
    }

    /**
     * Show the form for editing the specified perMinSend.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perMinSend = $this->perMinSendRepository->find($id);

        if (empty($perMinSend)) {
            Flash::error('Per Min Send not found');

            return redirect(route('perMinSends.index'));
        }

        return view('per_min_sends.edit')->with('perMinSend', $perMinSend);
    }

    /**
     * Update the specified perMinSend in storage.
     *
     * @param int $id
     * @param UpdateperMinSendRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateperMinSendRequest $request)
    {
        $perMinSend = $this->perMinSendRepository->find($id);

        if (empty($perMinSend)) {
            Flash::error('Per Min Send not found');

            return redirect(route('perMinSends.index'));
        }

        $perMinSend = $this->perMinSendRepository->update($request->all(), $id);

        Flash::success('Per Min Send updated successfully.');

        return redirect(route('perMinSends.index'));
    }

    /**
     * Remove the specified perMinSend from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perMinSend = $this->perMinSendRepository->find($id);

        if (empty($perMinSend)) {
            Flash::error('Per Min Send not found');

            return redirect(route('perMinSends.index'));
        }

        $this->perMinSendRepository->delete($id);

        Flash::success('Per Min Send deleted successfully.');

        return redirect(route('perMinSends.index'));
    }
}
