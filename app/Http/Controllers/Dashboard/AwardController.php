<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AwardRequest;
use App\Repositories\Classes\AwardRepository;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    protected AwardRepository $awardRepository;
    public function __construct(AwardRepository $awardRepository)
    {
        $this->awardRepository = $awardRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view_awards');
        if ($request->ajax()) {
            $awards = $this->awardRepository->findBy($request);
            return response()->json($awards);
        }
        return view('dashboard.awards.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_awards');
        return view('dashboard.awards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AwardRequest $request)
    {
        $this->authorize('create_awards');
        $this->awardRepository->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $this->authorize('show_awards');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update_awards');
        $award = $this->awardRepository->show($id);
        return view('dashboard.awards.edit', compact('award'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AwardRequest $request, string $id)
    {
        $this->authorize('update_awards');
        $this->awardRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_awards');
        $this->awardRepository->destroy($id);
    }
}
