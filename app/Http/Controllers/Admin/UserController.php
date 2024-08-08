<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function show(User $user, UserGallery $gallery){
        return view('admin.user.show',compact('user','gallery'));
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
    public function uploadFile(Request $request, User $user)
    {
        $data = $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif'
        ]);

        $path = $request->file('file')->store('user_galleries', 'public');
        $user->gallery()->create([
            'file_path' => $path,
            'type' => $request->file('file')->getClientOriginalExtension(),
            'size' => $request->file('file')->getSize(),
        ]);

        return redirect()->route('admin.user.show', $user->id)->with('success', 'File uploaded successfully');
    }

    public function deleteFile(User $user, UserGallery $gallery)
    {
        Storage::disk('public')->delete($gallery->file_path);
        $gallery->delete();
        return redirect()->route('admin.user.show', $user->id)->with('success', 'File deleted successfully');
    }
}
