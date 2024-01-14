<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\{Bug, Project, Award, Admin, Status, User};
use Illuminate\Support\Number;

class HomeController extends Controller
{
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


        return view('dashboard.home', get_defined_vars());
    }
}
