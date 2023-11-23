<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Project;

class JobController extends Controller
{
    public function index(Project $project)
    {
        $jobs = $project->jobs; // Use the 'jobs' relationship
        return view('Job.index', compact('project', 'jobs'));
    }

    // public function create(Project $project)
    // {
    //     return view('Job.create', compact('project'));
    // }

    public function create()
    {
        $project = Project::all();
        return view('Job.create', compact('project'));
    }

    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'proj_id' => 'required|exists:job,proj_id',
    //         'job_name' => 'required',
    //         'job_date' => 'required|date',
    //     ]);

    //     $job = new Job();
    //     $job->proj_id = $data['proj_id'];
    //     $job->job_name = $data['job_name'];
    //     $job->job_date = $data['job_date'];
    //     $job->save();

    //     return redirect()->route('Job.index', ['project' => $data['proj_id']]);
    // }

    public function store(Request $request)
    {
        $data = $request->validate([
            'proj_id' => 'required|exists:projects,proj_id',
            'job_name' => 'required',
            'job_date' => 'required|date',
            'job_status' => 'required',
            'job_remark' => 'required',
        ]);

            // Create and save the job
        $job = new Job();
        $job->proj_id = $data['proj_id'];
        $job->job_name = $data['job_name'];
        $job->job_date = $data['job_date'];
        $job->job_status = $data['job_status'];
        $job->job_remark = $data['job_remark'];
        $job->save();

        return redirect()->route('Job.index', ['project' => $data['proj_id']]);
}

    public function show($job_id)
    {
        $job = Job::with('project')->find($job_id);
        return view('Job.show', compact('job'));
    }

    public function edit($job_id)
    {
        $job = Job::find($job_id);
        return view('Job.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $data = $request->validate([
            'job_name'=> 'required',
            'job_date'=> 'required|date',
            'job_status' => 'required',
            'job_remark'=> 'required',
            
        ]);

        $job->update($data);
        // $project = $job->project;

        return redirect()->route('Job.index', ['project' => $job->proj_id]);
    }
    public function destroy($job_id)
    {
        $job = Job::find($job_id);
        if ($job) {
            $job->delete();
        }
        return redirect()->back()->with('success', 'Job deleted successfully');
    }
    
    public function search (Request $request)
    {
        $search = $request->input('search');

        $job = Job::query()
        ->where('job_name','LIKE','%'.$search.'%')
        ->orWhere('job_status','LIKE','%'.$search.'%')
        ->orWhere('job_remark','LIKE','%'.$search.'%')
        ->get();

        return view('search', compact('job'));
    }
    // public function destroy($job_id)
    // {
    //     $job = Job::find($job_id);
    //     $job->delete();
    //     return redirect()->route('Job.index', ['project' => $job->proj_id]);
    // }
}
?>
