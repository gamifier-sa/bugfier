<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BugRequest;
use App\Repositories\Classes\{BugRepository, ProjectRepository, UserRepository};
use Illuminate\Http\Request;

class BugController extends Controller
{
    protected BugRepository $bugRepository;
    protected ProjectRepository $projectRepository;
    protected UserRepository $userRepository;
    public function __construct(BugRepository $bugRepository, ProjectRepository $projectRepository, UserRepository $userRepository)
    {
        $this->bugRepository = $bugRepository;
        $this->projectRepository = $projectRepository;
        $this->userRepository = $userRepository;

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view_bugs');
        if ($request->ajax()) {
            $bugs = $this->bugRepository->findBy($request);
            return response()->json($bugs);
        }
        return view('dashboard.bugs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_bugs');
        $projects = $this->projectRepository->list();
        $users    = $this->userRepository->list();
        return view('dashboard.bugs.create', compact('projects','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BugRequest $request)
    {
        $this->authorize('create_bugs');
        $this->bugRepository->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//        $this->authorize('show_bugs');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update_bugs');
        $bug = $this->bugRepository->show($id);
        $projects = $this->projectRepository->list();
        $users    = $this->userRepository->list();
        return view('dashboard.bugs.edit', compact('bug','projects','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BugRequest $request, string $id)
    {
        $this->authorize('update_bugs');
        $this->bugRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_bugs');
        $this->bugRepository->destroy($id);
    }
}
