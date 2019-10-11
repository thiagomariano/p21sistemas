<?php

namespace AllBlacks\Http\Controllers\Admin;

use AllBlacks\Http\Controllers\Controller;
use AllBlacks\Http\Requests\UserCreateRequest;
use AllBlacks\Http\Requests\UserUpdateRequest;
use AllBlacks\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class ClientsController.
 *
 * @package namespace AllBlacks\Http\Controllers;
 */
class EmployeesController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * ClientsController constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
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
        $employees = $this->repository->paginate();
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserCreateRequest $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.employees.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $employess = $this->repository->find(Auth::user()->id);
        return view('admin.employees.edit', compact('employess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserUpdateRequest $request)
    {
        $this->repository->update($request->all(), Auth::user()->id);
        return redirect()->route('admin.employees.index');
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
