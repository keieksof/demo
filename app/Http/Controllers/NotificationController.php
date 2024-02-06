<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;

        return view('notifications.index', compact('notifications'));
    }

    public function clearAll()
    {
        auth()->user()->notifications()->delete();

        return redirect()->route('notifications.index');
    }
}

