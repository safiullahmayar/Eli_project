<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function create()
    {
        $roles = Role::get();
        return view('admin.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required',
        ]);

        $post = new User();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->password = Hash::make($request->password);
        $post->save();

        $post->roles()->attach($request->role);

        return redirect()->route('Alluser')->with('success', 'User created successfully');
    }
    public function Alluser()
    { 
        $users = User::with('roles')->get();
    
        // select('roles.name as role_name')->get();
        return view('admin.all_user', compact('users'));
    }
    public function edit_user($id)
{
$user=User::with('roles')->find($id);

}
    public function delete_user($id)

{
    $user = User::find($id);

    $user->roles()->detach();
    $user->delete();
    return response()->json(array('success' =>'Delete user'));
}
}
