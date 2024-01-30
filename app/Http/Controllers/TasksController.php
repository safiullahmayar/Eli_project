<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    /**
     * Display a listing of the resource.
     */ public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {

        $tasks = Task::get();
        return view('tasks.index', compact('tasks'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if ($request->user()->can('create-tasks')) {
        // if ($request->user()->can('create-task')) {
            $validate = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'status' => 'required',
            ]);
            if ($validate) {
                Task::create($request->all());
                return redirect()->route('task.index');
            } else {
                return redirect()->back();
            // }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $task = Task::find($id);

        return view('tasks.preview', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if ($validate) {
            $task->update($request->all());
            // return response()->json(array('success' =>'how'));
            return redirect()->route('task.index')->with('message', 'updated successfully');
        } else {
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json(array('data' => 'Delete user'));
    }
}
