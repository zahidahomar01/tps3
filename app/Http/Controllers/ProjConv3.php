<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function index(){
        $project = Project::all();
        //return view ('project.index', ['project' => $project]);
        return view ('project.index', compact('project'));
        
    }

    public function create(){
        return view('project.create');
    }

    public function store(Request $request){

        //to request appear only 1 attribute if nk appear semua buang projName
        //dd($request->projName);

        $data = $request->validate([
            'proj_name' => 'required',
            /*'picName' => 'required',
            'picEmail' =>'required',
            'picHp' => 'required|number',*/
            'proj_status' => 'required',
          //  'dateTime' => 'required',

        ]);

        //it will save in the database
        $newProject = Project::create($data);
        return redirect(route('project.index'));
    }


    public function edit(Project $project){
        return view ('project.edit',compact('project'));
    }
    /*public function edit(Project $project){
       return view ('project.edit', ['project' => $project]);
      
    }

    public function show(){

    }*/

    public function show($proj_id)
    {
        $project = Project::find($proj_id);
        return view('project.show',['projects'=>$project]);
    }
}
