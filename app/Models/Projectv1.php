<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use View;


class Project extends Eloquent
{
    use HasFactory;

    protected $fillable = [
        'proj_name',
        'proj_status', 
    ];

    public function pic(): BelongsTo
    {
        return $this->belongsTo(Pic::class);
    }

    public function index()
    {
        //get all projects
        $project = Project::all();

        //load the view and pass the projects
      //  return View::make('Project2.index');
      return view('Project2.index', compact('project'));
    }

    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('Project2.edit', compact('project'));
      
}
}
