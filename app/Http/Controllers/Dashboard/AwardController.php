<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AwardRequest;
use App\Repositories\Classes\AwardRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse, Request};

class AwardController extends Controller
{
    /**
     * @var AwardRepository
     */
    protected AwardRepository $awardRepository;

    /**
     * @param AwardRepository $awardRepository
     */
    public function __construct(AwardRepository $awardRepository)
    {
        $this->awardRepository = $awardRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View|JsonResponse
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
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_awards');
        return view('dashboard.awards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AwardRequest $request
     * @return void
     */
    public function store(AwardRequest $request)
    {
        $this->authorize('create_awards');
        $this->awardRepository->store($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(string $id)
    {
         $this->authorize('show_awards');
        $award = $this->awardRepository->show($id);
        return view('dashboard.awards.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(string $id)
    {
        $this->authorize('update_awards');
        $award = $this->awardRepository->show($id);
        return view('dashboard.awards.edit', get_defined_vars());
    }

    /**
     * @param AwardRequest $request
     * @param int|null     $id
     * @return void
     */
    public function update(AwardRequest $request, ?int $id)
    {
        $this->authorize('update_awards');
        $this->awardRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_awards');
        $this->awardRepository->destroy($id);
    }
}
