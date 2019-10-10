<?php

namespace AllBlacks\Http\Controllers\Admin;

use AllBlacks\Http\Controllers\Controller;
use AllBlacks\Http\Requests\ClientUpdateRequest;
use AllBlacks\Http\Requests\EmailSentCreateRequest;
use AllBlacks\Http\Requests\EmailSentUpdateRequest;
use AllBlacks\Repositories\EmailSentRepository;
use Carbon\Carbon;

/**
 * Class ClientsController.
 *
 * @package namespace AllBlacks\Http\Controllers;
 */
class EmailSentController extends Controller
{
    /**
     * @var EmailSentRepository
     */
    protected $repository;

    /**
     * ClientsController constructor.
     *
     * @param EmailSentRepository $repository
     */
    public function __construct(EmailSentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = $this->repository->paginate();
        return view('admin.emails.index', compact('emails'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmailSentCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EmailSentCreateRequest $request)
    {
        $mail = $this->repository->create($request->all());

        if ($request->get('send') == 0) {
            $this->repository->sendMail($mail->id);
        }

        return redirect()->route('admin.emails.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = $this->repository->find($id);
        return view('admin.emails.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EmailSentUpdateRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);
        if ($request->get('send') == 0) {
            $this->repository->sendMail($id);
        }
        return redirect()->route('admin.emails.index');
    }

    public function resendMail($id)
    {
        $this->repository->sendMail($id);
        return redirect()->route('admin.emails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.emails.index');
    }
}
