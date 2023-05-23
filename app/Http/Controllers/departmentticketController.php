<?php

namespace App\Http\Controllers;

use App\Models\tickethistory;
use App\Models\tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class departmentticketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

        return view('departmentticket');
    }
    public function getdepatmentticketsTable(Request $request)
    {
        if ($request->ajax()) {

        /*
            $data = tickets::with(['GetTheDepartmentName', 'priority', 'comments'])
                    ->where('DepartmentName', '=', auth()->user()->departmentname)->get();
       */
      $data = tickets::with(['GetTheDepartmentName', 'priority', 'comments'])
                        ->whereHas('GetTheDepartmentName', function ($query) {
                            $query->where('DepartmentName', '=', auth()->user()->DepartmentName);
                        })
                        ->get();




                        return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $actionBtn = '';
        
                            if (Gate::allows('role-delete') && Gate::allows('role-edit')){
                                $actionBtn ='
                                <div class="d-flex">
                                        <a  class="modal-effect  btn btn-primary btn-sm "
                                        data-effect="effect-scale"
                                        data-id ="' . $row["id"] . '"
                                        data-ticketname = "' . $row["TicketTitle"] . '"
                                        data-ticketnumber = "' . $row["TicketNumber"] . '"
                                        data-departmentname = "' . $row["DepartmentName"] . '"
                                        data-reportinguser = "' . $row["ReportingUser"] . '"
                                        data-ticketstate = "' . $row["Ticketstate"] . '"
                                        data-ticketdetails = "' . $row["TicketDetails"] . '"
                                        data-createdby = "' . $row["createdBY"] . '"
                                        data-id="' . $row["id"] . '"
                                        data-bs-toggle="modal"
                                        href="#exampleModal2" ><i class="las la-pen" style="font-size: 1.2em;"></i> </a>
                                   
        
                                    <a  class="modal-effect btn  btn-danger btn-sm "
                                    data-effect="effect-scale"
                                    data-ticketid = "' . $row["TicketTitle"] . '"
                                    data-id="' . $row["id"] . '"
                                    data-bs-toggle="modal"
                                    href="#modaldemo9" ><i class="las la-trash " style="font-size: 1.2em;"></i> </a>
                                </div>
        
                                ';
        
                            }
                            elseif (Gate::allows('role-edit')){
                                $actionBtn = '
                             
                                
                                        <a  class="modal-effect  btn btn-primary btn-sm "
                                        data-effect="effect-scale"
                                        data-id ="' . $row["id"] . '"
                                        data-ticketname = "' . $row["TicketTitle"] . '"
                                        data-ticketnumber = "' . $row["TicketNumber"] . '"
                                        data-departmentname = "' . $row["DepartmentName"] . '"
                                        data-reportinguser = "' . $row["ReportingUser"] . '"
                                        data-ticketstate = "' . $row["Ticketstate"] . '"
                                        data-ticketdetails = "' . $row["TicketDetails"] . '"
                                        data-createdby = "' . $row["createdBY"] . '"
                                        data-id="' . $row["id"] . '"
                                        data-bs-toggle="modal"
                                        href="#exampleModal2" ><i class="las la-pen" style="font-size: 1.2em;"></i> </a>
                                    ';
                            }
                            elseif (Gate::allows('role-delete')){
        
                                $actionBtn = '
                                <a  class="modal-effect btn  btn-danger btn-sm "
                                data-effect="effect-scale"
                                data-ticketid = "' . $row["TicketTitle"] . '"
                                data-id="' . $row["id"] . '"
                                data-bs-toggle="modal"
                                href="#modaldemo9" ><i class="las la-trash " style="font-size: 1.2em;"></i> </a>
                        
                            ';
                            }
                            return $actionBtn;
                        }) 
        
                     
                        ->addColumn('assigntouser', function ($row) {
                            $assigntouser ='';
                            if (Gate::allows('role-assign-to-user')){
                            $assigntouser = '  <a  class="modal-effect btn  btn btn-info btn-sm "
                            data-effect="effect-scale"
                            data-id="' . $row["id"] . '"
                            data-bs-toggle="modal"
                            href="#modaldemo18" >Assign To User</a>';
                            }
                            return $assigntouser;
        
                        })
                        ->rawColumns(['action', 'assigntouser'])->make(true);
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $b_exists = DB::table('tickets')
            ->where('TicketTitle', '=', $input['TicketTitle'])
            ->where('DepartmentId', '=', $input['DepartmentId'])
            ->where('ReportingUser', '=', $input['ReportingUser'])->exists();

        if ($b_exists) {

            session()->flash('Error', 'This Ticket Is Already Existes');
            return redirect('/departmentticket');

        } else {

            tickets::create([
                'TicketTitle' => $request->TicketTitle,
               'TicketNumber' => '000' . $request->id,  
                'DepartmentId' => $request->DepartmentId,
                'priority_id' => $request->priority_id,
                'ReportingUser' => $request->ReportingUser,
                'Ticketstate' => $request->Ticketstate,
                'createdBY' => $request->createdBY,
                'TicketDetails' => $request->TicketDetails,

            ]);
            session()->flash('Add', 'New Ticket has been Addedd');

            return redirect('/departmentticket');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /* $tickets = tickets::find($id)->with(['GetTheDepartmentName' , 'priority'])->get(); */
        $tickets = tickets::where('id', $id)->with(['GetTheDepartmentName', 'priority'])->get();

        /*  $comment =  comments::where('id', $id)->with(['ticket' , 'user'])->querry(); */
        $tickethistory = tickethistory::whereHas('ticket', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();


        return view('showtickets', compact('tickets', 'tickethistory', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function edit(tickets $tickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request)
    {
        $id = $request->id;
        $b_exists = tickets::find($id);
        if ($b_exists) {
            $b_exists->update([
                'assignuser' => $request->assignuser,
            ]);



            session()->flash('Add', 'New User Had Been Assigned');
            return redirect('/tickets');
        }
    }
    public function update(Request $request, tickets $tickets)
    {
        $id = $request->id;

        $this->validate($request, [

            'TicketTitle' => 'required',
            'DepartmentId' => 'required',
            'ReportingUser' => 'required',
            'Ticketstate' => 'required',
            'createdBY' => 'required',
            'TicketDetails' => 'required'

        ], [

                'TicketTitle.required' => 'You Should Enter  Ticket Title Name',
                'TicketTitle.unique' => 'Department Already reacorded',
                'DepartmentId.required' => ' You Should Enter  DepartmentId   ',
                'ReportingUser.required' => ' You Should Enter  ReportingUser   ',
                'Ticketstate.required' => ' You Should Enter  Ticketstate   ',
                'createdBY.required' => 'You Should Enter  createdBY',
                'TicketDetails.required' => 'You Should Enter  TicketDetails',

            ]);

        $tickets = tickets::find($id);
        $tickets->update([
            'TicketDetails' => $request->TicketDetails,
            'DepartmentId' => $request->DepartmentId,
            'ReportingUser' => $request->ReportingUser,
            'Ticketstate' => $request->Ticketstate,
            'createdBY' => $request->createdBY,
            'TicketDetails' => $request->TicketDetails,
        ]);

        session()->flash('edit', 'Ticket Had Been Edited Successfully');
        return redirect('/tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        tickets::find($id)->delete();
        session()->flash('delete', 'Ticket Has Been Deleted');
        return redirect('/tickets');
    }
}
