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
       
        
        $query= tickets::join('problemestypes as pt', 'tickets.TicketTitle', '=', 'pt.ProblemName')
        ->join('departmentes as d', 'd.id', '=', 'tickets.DepartmentId')
        ->select('pt.ProblemName', tickets::raw('COUNT(tickets.id) AS ticket_count'), 'tickets.Ticketstate', 'd.DepartmentName')
        
        ->groupBy('pt.ProblemName', 'tickets.Ticketstate', 'd.DepartmentName')
        ;
        
        if ($request->departmentName == '' ) {
            $query->where('d.id', $department);

        }
        if ($request->start_at) {
            $query->whereDate('tickets.created_at', '>=', $start_at);
        }
        
        if ($request->end_at) {
            $query->whereDate('tickets.created_at', '<=', $end_at);
        }


        $results = $query->get();
        return view('ProblemTypeReport')->withDetails($results);

            
            }
}
