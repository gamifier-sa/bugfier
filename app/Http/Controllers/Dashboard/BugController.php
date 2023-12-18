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
    public function __construct(
        BugRepository $bugRepository,
        ProjectRepository $projectRepository,
        UserRepository $userRepository,
    )
    {
        //        $this->authorize('view_bugs',['index']);
        //        $this->authorize('create_bugs', ['create', 'store']);
        //        $this->authorize('show_bugs', ['show']);
        //        $this->authorize('update_bugs', ['update']);
        //        $this->authorize('delete_bugs', ['destroy']);
        $this->bugRepository = $bugRepository;
        $this->projectRepository = $projectRepository;
        $this->userRepository = $userRepository;

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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
        $projects = $this->projectRepository->list();
        $users    = $this->userRepository->list();
        return view('dashboard.bugs.create', compact('projects','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BugRequest $request)
    {
        $this->bugRepository->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
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
        $this->bugRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bugRepository->destroy($id);
    }
}
