<?php

namespace App\Http\Controllers;
use App\Models\tickets;
use Illuminate\Http\Request;
use DB;

class ProblemTypeReport extends Controller
{
    public function index()
    {
        return view('ProblemTypeReport');
    }
    

    public function getcomplexReport(Request $request){
 
        $start_at = date($request->start_at);
        $end_at = date($request->end_at);



                    $start_date = '2023-01-01'; // Replace with your desired start date
                    $end_date = '2023-12-31'; // Replace with your desired end date

                    $results = tickets::join('problemestypes as pt', 'tickets.TicketTitle', '=', 'pt.ProblemName')
                        ->select('pt.ProblemName', tickets::raw('COUNT(tickets.id) as ticket_count'), 'tickets.Ticketstate')
                        ->whereBetween('tickets.created_at', [$start_at, $end_at])
                        ->groupBy('pt.ProblemName', 'tickets.Ticketstate')
                        ->get();

              

                            return view('ProblemTypeReport')->withDetails($results);
            
            }
}
