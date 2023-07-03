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






/*****************Bar Charts For All Department********************** */


$ticketCounts = tickets::select('Ticketstate', DB::raw('COUNT(Ticketstate) as count'))
                            ->groupBy('Ticketstate')
                            ->get();

$labels = collect($ticketCounts)->pluck('Ticketstate')->toArray();
$dataset = [];

foreach($ticketCounts as $key=>$value){
    $dataset [] = [
        "label" => $value->Ticketstate ,
        
    ];

}

$BarChart = app()->chartjs
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


        
        
        
        /************************Pie Charts For Add Departments*************************************** */
        $topUsers = TicketHistory::select('solving_User', DB::raw('COUNT(*) as count'))
                            ->groupBy('solving_User')
                            ->orderByDesc('count')
                            ->limit(5)
                            ->get();

                            
$baiChart = app()->chartjs
    ->name('pieChartTest')
    ->type('doughnut')
    ->size(['width' => 150, 'height' => 150])
    ->labels($topUsers->pluck('solving_User')->toArray())
    ->datasets([
        [
            "label" => "Numbers Of User Solving",
            'backgroundColor' => ['#f1000085', '#1bff00a3', '#c4e31ab0' , '##05fd52bf','#1532ff'],
            'data' => $topUsers->pluck('count')->toArray(),
        ],
    ])
    ->options([]);



/************************Pie Charts For Add Departments*************************************** */




      

        return view('home' , compact('BarChart','baiChart'))->with('myDepartmentTickets', $myDepartmentTickets)
                            ->with('allDeparmentNewTicketCount', $allDeparmentNewTicketCount);
       
    }
}
