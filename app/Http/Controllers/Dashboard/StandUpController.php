<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StandUpRequest;
use App\Repositories\Classes\{AdminRepository, StandUpRepository, StatusRepository};
use App\Models\Admin;
use App\Models\StandUp;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\{JsonResponse, Request};

class StandUpController extends Controller
{
    /**
     * @var StandUpRepository
     */
    protected StandUpRepository $standUpRepository;

    /**
     * @var AdminRepository
     */
    protected AdminRepository $adminRepository;

    /**
     * @param StandUpRepository $standUpRepository
     */
    public function __construct(StandUpRepository $standUpRepository, AdminRepository $adminRepository)
    {
        $this->standUpRepository = $standUpRepository;
        $this->adminRepository   = $adminRepository;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $this->authorize('view_stand_ups');
        $fromDate = Carbon::parse($request->from_date) ?? Carbon::now();
        $toDate   = Carbon::parse($request->to_date) ?? Carbon::now();
        $usersData = Admin::where('daily_attendance', '1')->with('standups')

            ->get()
            ->map(function ($admin) use ($fromDate, $toDate) {
                $standUps = $admin->standUps()
                    ->whereBetween('created_at', [$fromDate->startOfDay(), $toDate->endOfDay()])
                    ->select('attendance', DB::raw('count(*) as count'))
                    ->groupBy('attendance')
                    ->get()
                    ->mapWithKeys(function ($item) {
                        return [$item['attendance'] => $item['count']];
                    });

                return [
                    'name' => $admin->fullname,
                    'attend' => $standUps->get('attend', 0),
                    'not_attend' => $standUps->get('not_attend', 0),
                    'vacation' => $standUps->get('vacation', 0),
                ];
            })
            ->values()
            ->all();

        return view('dashboard.stand-ups.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_stand_ups');
        $admins = $this->adminRepository->list();
        return view('dashboard.stand-ups.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StandUpRequest $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->authorize('create_stand_ups');
        $attendanceData = $request->input('admins');
        foreach ($attendanceData as $data) {
            $this->standUpRepository->store($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(string $id)
    {
        $this->authorize('update_stand_ups');
        $standUp  = $this->standUpRepository->show($id);
        $admins   = $this->adminRepository->list();
        return view('dashboard.stand-ups.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StandUpRequest $request
     * @param string        $id
     * @return void
     */
    public function update(Request $request,string $id)
    {
        $this->authorize('update_stand_ups');
        $this->standUpRepository->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_stand_ups');
        $this->standUpRepository->destroy($id);
    }
}
