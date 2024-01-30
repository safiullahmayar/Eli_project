<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;


class IndoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications=Auth()->user()->unreadNotifications;

        return view('inbox.index',compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function markNotificationAsRead($id)
    {
        // Assuming you have a Notification model and a User model
        if($id)
        {
            Auth()->user()->unreadNotifications->where('id',$id)->markAsRead(); 
            return redirect()->back();
        }
    
        // Optionally, you can redirect the user back or to another page
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function clearAllNotifications()
    {
       $notifications= auth()->user()->unreadNotifications->markAsRead();
    
        return view('tasks.index', compact('notifications'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
