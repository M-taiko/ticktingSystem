<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class userReport extends Controller
{
    public function index()
    {
        return view('UserReport');

    }


    public function getuserReport(Request $request)
    {

        $start_at = date($request->start_at);
        $end_at = date($request->end_at);
        $department = $request->departmentName;
        //in case user didn't selcet any department

        if ($request->departmentName == '' && $request->start_at == '' && $request->end_at == '') {

            $result = DB::table('tickets')
                    ->join('users as u', 'tickets.assignuser', '=', 'u.name')
                    ->join('departmentes as d', 'tickets.DepartmentId', '=', 'd.id')
                    ->groupBy('d.DepartmentName', 'u.name', 'tickets.Ticketstate','tickets.id')
                    ->select('d.DepartmentName', 'u.name as assigned_user', 'tickets.Ticketstate','tickets.id')
                    ->get();

            return view('UserReport')->withDetails($result);

    }elseif ($request->departmentName && $request->start_at == '' && $request->end_at == ''){

                 $result = DB::table('tickets')
                        ->join('users as u', 'tickets.assignuser', '=', 'u.name')
                        ->join('departmentes as d', 'tickets.DepartmentId', '=', 'd.id')
                        ->where('d.id', $department)
                        ->groupBy('d.DepartmentName', 'u.name', 'tickets.Ticketstate','tickets.TicketTitle','tickets.id')
                        ->select('d.DepartmentName', 'u.name as assigned_user', 'tickets.Ticketstate' ,'tickets.TicketTitle','tickets.id')
                        ->get();

        return view('UserReport')->withDetails($result);
    }
    elseif ($request->departmentName && $request->start_at  && $request->end_at ) {

        $result = DB::table('tickets')
        ->join('users as u', 'tickets.assignuser', '=', 'u.name')
        ->join('departmentes as d', 'tickets.DepartmentId', '=', 'd.id')
        ->where('d.id', $department)
        ->whereBetween('tickets.created_at', [$start_at, $end_at])
        ->groupBy('d.DepartmentName', 'u.name', 'tickets.Ticketstate', 'tickets.TicketTitle','tickets.id')
        ->select('d.DepartmentName', 'u.name as assigned_user', 'tickets.Ticketstate', 'tickets.TicketTitle','tickets.id')
        ->get();
        return view('UserReport')->withDetails($result);

    }elseif ($request->departmentName =='' && $request->start_at  && $request->end_at ) {

       $result = DB::table('tickets')
    ->join('users as u', 'tickets.assignuser', '=', 'u.name')
    ->join('departmentes as d', 'tickets.DepartmentId', '=', 'd.id')
    ->whereBetween('tickets.created_at', [$start_at, $end_at])
    ->groupBy('d.DepartmentName', 'u.name', 'tickets.Ticketstate', 'tickets.TicketTitle','tickets.id')
    ->select('d.DepartmentName', 'u.name as assigned_user', 'tickets.Ticketstate', 'tickets.id', 'tickets.TicketTitle')
    ->get();


        return view('UserReport')->withDetails($result);
    }
    }
}