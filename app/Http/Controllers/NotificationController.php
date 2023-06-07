<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index(Request $request)
    {
        return view('notifications');
    }

    public function unread()
    {
        $unreadCount = Auth::user()->unreadNotifications;  // My logic to fetch the unread notification count
    
        return response()->json(['count' => $unreadCount]);



    }
}
