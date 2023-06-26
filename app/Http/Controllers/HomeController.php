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
    "label" => "The Tickets" ,
    'backgroundColor' =>['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 205, 86, 0.5)'],
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
    'borderRadius' => 25, // Set the border radius
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
    ->size(['width' => 50, 'height' => 50])
    ->labels($topUsers->pluck('solving_User')->toArray())
    ->datasets([
        [
            "label" => "Numbers Of User Solving",
            'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 205, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
            'data' => $topUsers->pluck('count')->toArray(),
        ],
    ])
    ->options([]);



/************************Pie Charts For Add Departments*************************************** */




      

        return view('home' , compact('BarChart','baiChart'))->with('myDepartmentTickets', $myDepartmentTickets)
                            ->with('allDeparmentNewTicketCount', $allDeparmentNewTicketCount);
       
    }
}
