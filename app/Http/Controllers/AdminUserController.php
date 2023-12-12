<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('Admin.User.index', compact('user'));
    }

    public function create()
    {
        return view('Admin.User.create');
    }

    public function store (Request $request)
    {
        $data = $request->validate([
            'name' =>'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required|in:0,1', //to makesure only int 0 or 1 insert 
        ]);
        User::create($data);
        return redirect()->route('Admin.User.index')->with('success','User created successfully');
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('Admin.User.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'role' => 'required',
        ]);

        $user->update($data);

        return redirect()->route('Admin.User.index')->with('success','User updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function changeRole(Request $request, User $user)
    {
        $request->validate([
            'role' =>'required|in:admin,user',
        ]);

        $user->update(['role' => $request->input('role')]);
        
        return redirect()->route('Admin.User.index')->with('Success', 'User role updated successfully');
    }
}
