<?php

namespace AllBlacks\Http\Controllers\Admin;

use AllBlacks\Forms\ClientForm;
use AllBlacks\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;
use AllBlacks\Http\Requests\ClientCreateRequest;
use AllBlacks\Http\Requests\ClientUpdateRequest;
use AllBlacks\Repositories\ClientRepository;

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
     * ClientsController constructor.
     *
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
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
        $form = \FormBuilder::create(ClientForm::class, [
            'url' => route('admin.clients.store'),
            'method' => 'POST'
        ]);
        return view('admin.clients.create', compact('form'));
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
    public function update(Request $request, $id)
    {
        $this->repository->update($request->all(), $id);
        return redirect()->route('admin.clients.index');
    }

    public function imports()
    {
        return dd('asdf');
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
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Client deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Client deleted.');
    }
}
