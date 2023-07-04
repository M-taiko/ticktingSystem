<?php

namespace App\Http\Controllers;

use App\Models\tickets;
use Illuminate\Support\Facades\Auth;
use App\Models\TicketHistory;
use DB;
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
        /***start of  Card Querry**** */
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


        /****End Of card Querry******** */



        /*****************Bar Charts For All Department********************** */


        $ticketCounts = tickets::select('Ticketstate', DB::raw('COUNT(Ticketstate) as count'))
            ->groupBy('Ticketstate')
            ->get();

        $labels = collect($ticketCounts)->pluck('Ticketstate')->toArray();
        $dataset = [];

        foreach ($ticketCounts as $key => $value) {
            $dataset[] = [
                "label" => $value->Ticketstate,

            ];

        }

        $AllDepartmentBarChart = app()->chartjs
            ->name('barChartTest')
            ->type('polarArea')
            ->size(['width' => 400, 'height' => 400])
            ->labels($ticketCounts->pluck('Ticketstate')->toArray())
            ->datasets([
                [
                    "label" => "The Tickets",
                    'backgroundColor' => ['#f1000085', '#1bff00a3', '#c4e31ab0'],
                    'data' => $ticketCounts->pluck('count')->toArray()
                ],
            ])
            ->options([
                'scales' => [
                    'yAxes' => [
                        [
                            'ticks' => [
                                'beginAtZero' => true,
                            ],
                        ],
                    ],
                ],
                'borderRadius' => 6,
                'layout' => [
                    'padding' => [
                        'left' => 18,
                        'right' => 18,
                        'top' => 18,
                        'bottom' => 18,
                    ],
                ],
            ]);


        /*****************Bar Charts For All Department********************** */


        /*****************Bar Charts For My Department********************** */


        $MyDepartmentTicketCounts = tickets::select('tickets.Ticketstate', DB::raw('COUNT(tickets.Ticketstate) as count'))
            ->join('departmentes', 'departmentes.id', '=', 'tickets.DepartmentId')
            ->where('departmentes.DepartmentName', Auth::user()->DepartmentName)
            ->groupBy('tickets.Ticketstate')
            ->get();

        $labels = collect($MyDepartmentTicketCounts)->pluck('Ticketstate')->toArray();


        $MyDepartmentBarChart = app()->chartjs
            ->name('MyDepartmentBarChart')
            ->type('polarArea')
            ->size(['width' => 400, 'height' => 400])
            ->labels($MyDepartmentTicketCounts->pluck('Ticketstate')->toArray())
            ->datasets([
                [
                    "label" => "The Tickets",
                    'backgroundColor' => ['#f1000085', '#1bff00a3', '#c4e31ab0'],
                    'data' => $MyDepartmentTicketCounts->pluck('count')->toArray()
                ],
            ])
            ->options([
                'scales' => [
                    'yAxes' => [
                        [
                            'ticks' => [
                                'beginAtZero' => true,
                            ],
                        ],
                    ],
                ],
                'borderRadius' => 6,
                'layout' => [
                    'padding' => [
                        'left' => 18,
                        'right' => 18,
                        'top' => 18,
                        'bottom' => 18,
                    ],
                ],
            ]);


        /*****************Bar Charts For My Department********************** */





        /************************Pie Charts For All Departments*************************************** */
        $topUsers = TicketHistory::select('solving_User', DB::raw('COUNT(*) as count'))
            ->groupBy('solving_User')
            ->orderByDesc('count')
            ->limit(5)
            ->get();


        $AllDepartmentbaiChart = app()->chartjs
            ->name('AllDepartmentbaiChart')
            ->type('doughnut')
            ->size(['width' => 150, 'height' => 150])
            ->labels($topUsers->pluck('solving_User')->toArray())
            ->datasets([
                [
                    "label" => "Numbers Of User Solving",
                    'backgroundColor' => ['#f1000085', '#1bff00a3', '#c4e31ab0', '##05fd52bf', '#1532ff'],
                    'data' => $topUsers->pluck('count')->toArray(),
                ],
            ])
            ->options([]);



        /************************Pie Charts For All Departments*************************************** */


        /************************Pie Charts For My Departments*************************************** */
        $topUsersofMyDepartment = TicketHistory::select('tickethistories.solving_User', DB::raw('COUNT(*) as count'))
            ->join('users', 'users.id', '=', 'tickethistories.user_id')
            ->where('users.DepartmentName', Auth::user()->DepartmentName)
            ->groupBy('tickethistories.solving_User')
            ->orderByDesc('count')
            ->limit(5)
            ->get();



        $MyDepartmentbaiChart = app()->chartjs
            ->name('MyDepartmentbaiChart')
            ->type('doughnut')
            ->size(['width' => 150, 'height' => 150])
            ->labels($topUsersofMyDepartment->pluck('solving_User')->toArray())
            ->datasets([
                [
                    "label" => "Numbers Of User Solving",
                    'backgroundColor' => ['#f1000085', '#1bff00a3', '#c4e31ab0', '##05fd52bf', '#1532ff'],
                    'data' => $topUsersofMyDepartment->pluck('count')->toArray(),
                ],
            ])
            ->options([]);



        /************************Pie Charts For My Departments*************************************** */






        return view('home', compact('AllDepartmentBarChart', 'MyDepartmentBarChart', 'AllDepartmentbaiChart', 'MyDepartmentbaiChart'))
            ->with('myDepartmentTickets', $myDepartmentTickets)
            ->with('allDeparmentNewTicketCount', $allDeparmentNewTicketCount);

    }
}