<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all(); 
        Notification::send($users, new \App\Notifications\WelcomeNotification());
        // Return the view with the users data
        return view('welcome', ['users' => $users]);
    }
    // In your controller

public function showExpiredUsers()
{
    // Fetch users with expired membership (status 0)
    $expiredUsers = \App\Models\User::where('status', 0)->get();
    
    return view('dummy-users', ['users' => $expiredUsers]);
}
}

// In your controller

