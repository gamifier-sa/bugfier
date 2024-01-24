<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\{Bug, Project, Award, Admin, Status};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Support\Number;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function home()
    {
        $countAdmins = Number::format(Admin::count());


        $topAdmins = Admin::select('name_ar', 'name_en', 'email','image')
            ->withCount('bugs')
            ->orderByDesc('bugs_count')
            ->limit(3)
            ->get();

        $topUsers = Admin::select('name_ar', 'name_en', 'email','image')
            ->withCount('bugs_responsible_admin')
            ->orderByDesc('bugs_responsible_admin_count')
            ->limit(5)
            ->get();

        $topProjects = Project::withCount('bugs')
            ->orderByDesc('bugs_count')
            ->limit(5)
            ->get();


        $topStatus = Status::withCount('bugs')
            ->orderByDesc('bugs_count')
            ->limit(5)
            ->get();

        $countBugs     = Number::format(Bug::count());
        $countProjects = Number::format(Project::count());
        $countAwards   = Number::format(Award::count());
        $countStatuses = Number::format(Status::count());

        $countAdminsActive    = $this->getAdminCountByStatus('active');
        $countAdminsPending   = $this->getAdminCountByStatus('pending');
        $countAdminsBlock     = $this->getAdminCountByStatus('block');
        return view('dashboard.home', get_defined_vars());
    }

    /**
     * Get the count of admins based on a specific status.
     *
     * @param int|string $status
     * @return false|string
     */
    public function getAdminCountByStatus(int|string $status) {
        return Number::format(Admin::where('status', $status)->count());
    }
}
