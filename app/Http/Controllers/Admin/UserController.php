<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function show(){

    }

    public function create(){
    return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',

        ]);
        User::create($data);
        return redirect()->route('admin.user.index');

    }

    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));

    }
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
           'name'=>'required',
           'email'=>'required|email|unique:users,email,' . $user->id,
        ]);
        $user->update($data);
        return redirect()
            ->route('admin.user.index')
            ->with('success','User updated successfully');

    }

    public function destroy(User $user){
        $user->delete();
        return redirect()
            ->route('admin.user.index')
            ->with('success','User deleted successfully');
    }
}
