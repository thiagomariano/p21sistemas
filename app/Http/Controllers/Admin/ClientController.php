<?php

namespace AllBlacks\Http\Controllers\Admin;

use AllBlacks\Http\Controllers\Controller;
use AllBlacks\Http\Requests\ClientCreateRequest;
use AllBlacks\Http\Requests\ClientImportRequest;
use AllBlacks\Http\Requests\ClientUpdateRequest;
use AllBlacks\Repositories\ClientRepository;
use AllBlacks\Repositories\ImportRepository;

/**
 * Class ClientsController.
 *
 * @package namespace AllBlacks\Http\Controllers;
 */
class ClientController extends Controller
{
    /**
     * @var ClientRepository
     */
    protected $repository;
    /**
     * @var ImportRepository
     */
    private $importRepository;

    /**
     * ClientsController constructor.
     *
     * @param ClientRepository $repository
     * @param ImportRepository $importRepository
     */
    public function __construct(ClientRepository $repository, ImportRepository $importRepository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->importRepository = $importRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->repository->paginate();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ClientCreateRequest $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.clients.index');
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
        $client = $this->repository->find($id);
        return view('admin.clients.edit', compact('client'));
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
    public function update(ClientUpdateRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);
        return redirect()->route('admin.clients.index');
    }

    public function import()
    {
        $result = null;
        return view('admin.clients.import', compact('result'));
    }

    public function importFile(ClientImportRequest $request)
    {
        $result = $this->repository->import($request);
        $this->importRepository->create($result);
        return view('admin.clients.import', compact('result'));
    }

    public function sendMailClient($id)
    {
        $this->repository->sendMailClient($id);
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
        return redirect()->back()->with('message', 'Client deleted.');
    }
}
