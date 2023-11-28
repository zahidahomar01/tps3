<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pic;
use App\Models\Project;
use App\Models\Job;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $pic = Pic::count();
        $project = Project::count();
        $job = Job::count();
        $totalCompletedJobs = Job::where('job_status', 'Complete')->count();

        return view('Admin.Dashboard', compact('user', 'pic', 'project', 'job', 'totalCompletedJobs'));

    }

}