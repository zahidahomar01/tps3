<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Pic;
class UserProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $pics = Pic::all();
        return view('User.Project.index', compact('projects', 'pics'));
    }

    
}

