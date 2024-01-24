<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StatusRequest;
use App\Repositories\Classes\StatusRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse,  Request};

class StatusController extends Controller
{
    /**
     * @var StatusRepository
     */
    protected StatusRepository $statusRepository;

    /**
     * @param StatusRepository $statusRepository
     */
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View|JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view_statuses');
        if ($request->ajax()) {
            $status = $this->statusRepository->findBy($request);
            return response()->json($status);
        }
        return view('dashboard.statuses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_statuses');
        return view('dashboard.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StatusRequest $request
     * @return void
     */
    public function store(StatusRequest $request)
    {
        $this->authorize('create_statuses');
        $this->statusRepository->store($request->validated());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(string $id)
    {
        $this->authorize('update_statuses');
        $status = $this->statusRepository->show($id);
        return view('dashboard.statuses.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StatusRequest $request
     * @param string        $id
     * @return void
     */
    public function update(StatusRequest $request,string $id)
    {
        $this->authorize('update_statuses');
        $this->statusRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_statuses');
        $this->statusRepository->destroy($id);
    }
}
