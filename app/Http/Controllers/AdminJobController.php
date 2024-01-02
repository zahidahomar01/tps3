<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Project;

class AdminJobController extends Controller
{
    public function index(Project $project)
    {
        $jobs = $project->jobs; // Use the 'jobs' relationship
        return view('Admin.Job.index', compact('project', 'jobs'));
    }

    public function create()
    {
        $project = Project::all();
        return view('Admin.Job.create', compact('project'));
    }

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

        // return redirect()->route('Admin.Job.index', ['project' => $data['proj_id']]);
        // dd($job->proj_id);
        return redirect()->route('Admin.Job.index', ['project' => $job->proj_id]);
}

    public function show($job_id)
    {
        $job = Job::with('project')->find($job_id);
        return view('Admin.Job.show', compact('job'));
    }

    public function edit($job_id)
    {
        $job = Job::find($job_id);
        return view('Admin.Job.edit', compact('job'));
    }

    // public function update(Request $request, Job $job)
    // {
    //     $data = $request->validate([
    //         'job_name'=> 'required',
    //         'job_date'=> 'required|date',
    //         'job_status' => 'required',
    //         'job_remark'=> 'required',
    //     ]);
    
    //     $job->update($data);
    
    //     return redirect()->route('Admin.Job.index', ['project' => $job->proj_id]);
    // }

    public function update(Request $request, Project $project, $job_id)
    {
        $data = $request->validate([
            'proj_id' => 'required|exists:projects,proj_id',
            'job_name'=> 'required',
            'job_date'=> 'required|date',
            'job_status' => 'required',
            'job_remark'=> 'required',
        ]);
        
        $job = Job::find($job_id);
        if ($job)
         {
            $job->proj_id = $data['proj_id'];
            $job->job_name = $data['job_name'];
            $job->job_date = $data['job_date'];
            $job->job_status = $data['job_status'];
            $job->job_remark = $data['job_remark'];
            $job->save();

            return redirect()->route('Admin.Job.index', ['project' => $data['proj_id']]);
        }
        else
        {

        }
        }


      /*  $job->update([
            'proj_id' => $data['proj_id'],
            'job_name' => $data['job_name'],
            'job_date' => $data['job_date'],
            'job_status' => $data['job_status'],
            'job_remark' => $data['job_remark'],
        ]);
        return redirect()->route('Admin.Job.index', ['project' => $data['proj_id']]);
    
    }
        // $job->proj_id = $data['proj_id'];
        // $job->job_name = $data['job_name'];
        // $job->job_date = $data['job_date'];
        // $job->job_status = $data['job_status'];
        // $job->job_remark = $data['job_remark'];
        // $job->update();

        // return redirect()->route('Admin.Job.index', ['project' => $data['proj_id']]);
    
    */
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

}
?>
