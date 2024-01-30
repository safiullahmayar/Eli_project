<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $task=Task::get();
        return view('admin.index', compact('task'));
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
        // $role=Role::get();
        try {
            $user = User::with('roles')->find($id);
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function delete_user($id)

    {
        $user = User::find($id);

        $user->roles()->detach();
        $user->delete();
        return response()->json(array('success' => 'Delete user'));
    }

    // public function user_logout()
    // {
    //     //   $user=User::find($id);
    //     Auth::logout();
    // }
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
