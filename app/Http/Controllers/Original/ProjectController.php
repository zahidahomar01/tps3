<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Pic;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $pics = Pic::all();
        return view('Project.index', compact('projects', 'pics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $pics = Pic::all();
       return view('Project.create', ['pic' => $pics]);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $data = $request->validate([
            'pic_id'=> 'required|exists:pics,pic_id',
            'proj_name' => 'required',
            'proj_status' => 'required',
            'proj_date' => 'required',
        ]);

        // Create a new project
        $project = new Project;
        $project->pic_id = $data['pic_id'];
        $project->proj_name = $data['proj_name'];
        $project->proj_status = $data['proj_status'];
        $project->proj_date = $data['proj_date'];
        $project->save();
        // Redirect to the project index page
       // return redirect()->route('Project.index');
       return redirect()->route('Project.index',['pic' => $data['pic_id']]);
    }

    public function show($proj_id)
    {
   
        $project = Project::with('jobs')->find($proj_id);
        return view('Project.show', compact('project'));
    }

    public function edit($proj_id)
    {
        //foreach($request->pic_id as $key => $pic_id)

        
        $project = Project::find($proj_id);
        $pics = Pic::all();
        return view(('Project.edit'), compact('project'), ['pics' => $pics]);
    }

    public function update(Request $request, $proj_id)
    {
        // Validate the form data
        $data = $request->validate([
            'pic_id'=> 'required|exists:pics,pic_id',
            'proj_name' => 'required',
            'proj_status' => 'required',
            'proj_date' => 'required',
            
        ]);
  
        $project = Project::find($proj_id);
        
        if ($project) {
            // dd($data); // Debug to check the submitted data
            //  dd($project); // Debug to check the project

            $project->pic_id = $data['pic_id']; 
            $project->proj_name = $data['proj_name'];
            $project->proj_status = $data['proj_status'];
            $project->proj_date = $data['proj_date'];
            $project->save(); 
         
            return redirect()->route('Project.index');
        } else {
            // Handle the error (e.g., project not found)
        }
    
       
    }
    

    public function destroy($proj_id)
    {
        $project = Project::find($proj_id);

        if($project){
            $project->delete();
        }

        return redirect()->back();
    }

    
  
    /* function destroy($proj_id)
    {
        $project = Project::find($proj_id);
        $project->delete();
        return redirect()->route('Project.index');
    }*/

}
