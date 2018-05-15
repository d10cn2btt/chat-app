<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function listAll()
    {
        return Auth::user()->unreadNotifications;
    }

    public function read(Request $request)
    {
        return Auth::user()->unreadNotifications()->find($request->id)->markAsRead();
    }
}
