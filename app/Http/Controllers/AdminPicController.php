<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pic;
use App\Models\Project;

class AdminPicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pics = Pic::all();
        return view('Admin.Pic.index', compact('pics'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Pic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pic_name'=> 'required',
            'pic_hp'=> 'required',
            'pic_email'=> 'required',
        ]);

        Pic::create($data);
        return redirect()->route('Admin.Pic.index')->with('success','PIC created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($pic_id)
    {
        $pic = Pic::find($pic_id);
        return view('Admin.Pic.show', compact('pic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($pic_id)
    {
        $pic = Pic::find($pic_id);
        return view('Admin.Pic.edit', compact('pic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $pic_id)
    {
        $data = $request->validate([
            'pic_name'=> 'required',
            'pic_hp'=>'required',
            'pic_email'=> 'required',
        ]);

        $pic = Pic::find($pic_id);
        if($pic)
        {
            $pic->pic_name= $data['pic_name'];
            $pic->pic_hp= $data['pic_hp'];
            $pic->pic_email= $data['pic_email'];
            $pic->save();

            return redirect()->route('Admin.Pic.index')->with('success','Pic updated successfully');

        }
        else
        {

        }
    }
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pic_id)
    { 
        Pic::find($pic_id)->delete();
        return redirect()->back()->with('success','Pic deleted successfully');
    }

}

?>