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
        $department = $request->departmentName;
        //in case user didn't selcet any department
       
        if ($request->start_at && $request->end_at && $request->departmentName == '' ) {
                   

                    $results = tickets::join('problemestypes as pt', 'tickets.TicketTitle', '=', 'pt.ProblemName')
                    ->join('departmentes as d', 'd.id', '=', 'tickets.DepartmentId')
                    ->select('pt.ProblemName', tickets::raw('COUNT(tickets.id) as ticket_count'), 'tickets.Ticketstate', 'd.DepartmentName')
                        ->whereBetween('tickets.created_at', [$start_at, $end_at])
                        ->groupBy('pt.ProblemName', 'tickets.Ticketstate', 'd.DepartmentName')
                        ->get();

              

                            return view('ProblemTypeReport')->withDetails($results);
                            
        }else {

            $results = tickets::join('problemestypes as pt', 'tickets.TicketTitle', '=', 'pt.ProblemName')
            ->join('departmentes as d', 'd.id', '=', 'tickets.DepartmentId')
            ->select('pt.ProblemName', tickets::raw('COUNT(tickets.id) AS ticket_count'), 'tickets.Ticketstate', 'd.DepartmentName')
            ->where('d.id', $department)
            ->whereBetween('tickets.created_at', [$start_at, $end_at])
            ->groupBy('pt.ProblemName', 'tickets.Ticketstate', 'd.DepartmentName')
            ->get();
            
            return view('ProblemTypeReport')->withDetails($results);
            
        }
        
  
            
            }
}
