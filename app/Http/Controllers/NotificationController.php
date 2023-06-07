<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{


    public function unread()
    {
        $unreadCount = Auth::user()->unreadNotifications;  // My logic to fetch the unread notification count
    
        return response()->json(['count' => $unreadCount]);



    }
}
