<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StatusRequest;
use App\Repositories\Classes\StatusRepository;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    protected StatusRepository $statusRepository;
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Display a listing of the resource.
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
     */
    public function create()
    {
        $this->authorize('create_statuses');
        return view('dashboard.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusRequest $request)
    {
        $this->authorize('create_statuses');
        $this->statusRepository->store($request->validated());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update_statuses');
        $status = $this->statusRepository->show($id);
        return view('dashboard.statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatusRequest $request, string $id)
    {
        $this->authorize('update_statuses');
        $this->statusRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_statuses');
        $this->statusRepository->destroy($id);
    }
}
