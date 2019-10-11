<?php

namespace AllBlacks\Http\Controllers\Admin;

use AllBlacks\Http\Controllers\Controller;
use AllBlacks\Repositories\ImportRepository;

/**
 * Class ClientsController.
 *
 * @package namespace AllBlacks\Http\Controllers;
 */
class ImportController extends Controller
{
    /**
     * @var ImportRepository
     */
    protected $repository;

    /**
     * ClientsController constructor.
     *
     * @param ImportRepository $repository
     */
    public function __construct(ImportRepository $repository)
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
        $imports = $this->repository->paginate();
        return view('admin.imports.index', compact('imports'));
    }
}
