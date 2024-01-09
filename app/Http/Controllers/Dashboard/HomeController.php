<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\{Bug, Project, Award, Admin, Status};
use Illuminate\Support\Number;

class HomeController extends Controller
{
    public function home()
    {
        $countAdmins = Number::format(Admin::whereHas('roles', function ($q) {
            $q->where('id', 1);
        })->count());

        $countUsers = Number::format(Admin::whereHas('roles', function ($q) {
            $q->where('id', 2);
        })->count());

        $countBugs     = Number::format(Bug::count());
        $countProjects = Number::format(Project::count());
        $countAwards   = Number::format(Award::count());
        $countStatuses = Number::format(Status::count());
        return view('dashboard.home', get_defined_vars());
    }
}
