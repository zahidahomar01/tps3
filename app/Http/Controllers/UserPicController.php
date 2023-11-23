<?php

namespace App\Http\Controllers;

use App\Models\Pic;

class UserPicController extends Controller
{
    public function index()
    {
        $pics = Pic::all();
        return view('User.Pic.index', compact('pics'));
    }
    public function show($pic_id)
    {
        $pic = Pic::find($pic_id);
        return view('User.Pic.show', compact('pic'));
    }
}
