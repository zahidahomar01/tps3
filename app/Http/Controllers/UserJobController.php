<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Job;

class UserJobController extends Controller
{
    public function index(Project $project)
    {
        $jobs = $project->jobs; // Use the 'jobs' relationship
        return view('User.Job.index', compact('project', 'jobs'));
    }
  
}
