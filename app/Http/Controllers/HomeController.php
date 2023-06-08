<?php

namespace App\Http\Controllers;
use App\Models\tickets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allDeparmentNewTicketCount = tickets::selectRaw('SUM(CASE WHEN Ticketstate = "New" THEN 1 ELSE 0 END) AS NewTicket')
        ->selectRaw('SUM(CASE WHEN Ticketstate = "Pending" THEN 1 ELSE 0 END) AS PendingTickets')
        ->selectRaw('SUM(CASE WHEN Ticketstate = "Closed" THEN 1 ELSE 0 END) AS ClosedTickets')
        ->selectRaw('COUNT(*) as TotalTickets')
        ->get();





        $departmentName = Auth::user()->DepartmentName;

        $myDepartmentTickets = \App\Models\tickets::join('departmentes', 'departmentes.id', '=', 'tickets.DepartmentId')
        ->where('departmentes.DepartmentName', '=', $departmentName)
        ->selectRaw('SUM(CASE WHEN Ticketstate = "New" THEN 1 ELSE 0 END) AS NewTicket')
        ->selectRaw('SUM(CASE WHEN Ticketstate = "Pending" THEN 1 ELSE 0 END) AS PendingTickets')
        ->selectRaw('SUM(CASE WHEN Ticketstate = "Closed" THEN 1 ELSE 0 END) AS ClosedTickets')
        ->selectRaw('(SUM(CASE WHEN Ticketstate = "New" THEN 1 ELSE 0 END) +
                        SUM(CASE WHEN Ticketstate = "Pending" THEN 1 ELSE 0 END) +
                        SUM(CASE WHEN Ticketstate = "Closed" THEN 1 ELSE 0 END)) AS TotalTickets')
        ->where('departmentes.DepartmentName', '=', $departmentName)
        ->get();




      

        return view('home')->with('myDepartmentTickets', $myDepartmentTickets)
                            ->with('allDeparmentNewTicketCount', $allDeparmentNewTicketCount);
       
    }
}
