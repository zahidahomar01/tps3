<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Project;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch the job related to the specified project ID
        $job = job::all();
        return view ('job.index',['job'=>$job]);
        // Fetch jobs related to the specified project ID
        //$jobs = Job::where('proj_id', $proj_id)->get();

        // Pass the project and jobs to the view
        //return view('job.index', ['project' => $project, 'jobs' => $jobs]);
    }

        

    // public function create()
    // {
    //     return view('job.create');
    // }

    public function create(Request $request)
    {
        $proj_id = $request->input('proj_id'); // Get the project ID from the request
      // dd ($proj_id);
        $project = Project::find($proj_id);

        if (!$project) {
            // Handle the case where the specified project doesn't exist.
            // You might want to redirect back with an error message.
        }

        return view('job.create', ['project' => $project]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_name' => 'required',
            'job_date' => 'required',
            'proj_id'=>'required|exists:projects,proj_id'

        ]);

        $newData = [
            'job_name' => $request->input('job_name'),
            'job_date' => $request->input('job_date'),
            'proj_id'=> $request->input('proj_id'),
        ];

        Job::create($newData);
        // $data = $request->validate([
        //     'job_name' => 'required',
        //     'job_date' => 'required',
        //     'proj_id'=>'required|exists:projects,proj_id'
        // ]);

        // $newJob = Job::create($data);
        //  return redirect(route('job.index'));


        // Job::create($request->all());
        // return redirect()->route('job.index')
        //   ->with('success', 'Job created successfully.');
        return redirect()->route('job.index')
        ->with('success', 'Job created successfully.');
}

    public function edit($job_id)
    {
       // return view('job.edit',['job' =>$job]);
       $job = Job::find($job_id);
       return view('job.edit',compact('job'));
    }

    public function update(Job $job, Request $request)
    {
        $data=$request->validate([
            'job_name' => 'required',
            'job_date' => 'required',
            'proj_id'=>'required|exists:projects,proj_id'

        ]);

        $job->update($data);

        return redirect(route('job.index'))->with('success', 'Product updated successfully');
    }
    public function show($proj_id)
    {
        $project = Project::find($proj_id);
        $job = Job::where('proj_id', $proj_id)->latest();
        //dd($job);
        return view('job.show', compact('project','job'));
        // $job = $project->jobs;
        // return view('job.show',['project' => $project, 'jobs' =>$job]);
        // $job = Job::where('proj_id', $proj_id)->latest();
        // return view('job.index', compact('job'));
       
        /*  $job = Job::where('proj_id', $proj_id)->latest();
        //$job = Job::find($job_id);
        return view ('job.index',compact('job'));*/
    }



}
