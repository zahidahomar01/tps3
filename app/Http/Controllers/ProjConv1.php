<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \App\Models\Project;
use \App\Models\Pic;

class Project2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::orderBy('proj_name', 'asc')->paginate(5);
        
        return view('Project2.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Project2.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = Project::create([
            'proj_name'=> $request->get('proj_name'),
            'proj_status'=>$request->get('proj_status'),
        ]);

        $pic = Pic::create([
            'pic_name'=>$request->get('pic_name'),
            'pic_hp'=>$request->get('pic_hp'),
            'pic_email'=>$request->get('pic_email'),
        ]);

       // Project::create($request->post());

       $project->pic()->save($pic);
        return redirect()->route('Project2.index')->with('success', 'Project successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view ('Project2.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('Project2.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        
        $request->validate([
            'proj_name'=> 'required',
            'pic_name'=>'required',
            'pic_hp'=>'required',
            'pic_email'=>'required',
            'proj_status'=>'required',
        ]);

        $project->fill($request->post())->save();

        return redirect()->route('Project2.index')->with ('success','Project has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
 /*   public function destroy(string $id)
    {
        
    }*/

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('Project2.index')->with('success','Project has been deleted successfully');
    }
}
