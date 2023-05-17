<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       return view('comments');
    }


    public function edit(Request $request)
    {
       //
    }



    public function getcommentsTable(Request $request)
    {
        if ($request->ajax()) {


          $data =   comments::with(['ticket' , 'user']);  
         
    
   
      
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '

                                        <a  class="modal-effect btn btn-primary delete btn btn-primary btn-sm btn-block"
                                        data-effect="effect-scale"
                                        data-id ="'.$row["id"].'"
                                        data-ticketname = "'.$row["TicketTitle"].'"
                                        data-ticketnumber = "'.$row["TicketNumber"].'"
                                        data-departmentname = "'.$row["DepartmentName"].'"
                                        data-reportinguser = "'.$row["ReportingUser"].'"
                                        data-ticketstate = "'.$row["Ticketstate"].'"
                                        data-ticketdetails = "'.$row["TicketDetails"].'"
                                        data-createdby = "'.$row["createdBY"].'"
                                        data-id="'.$row["id"].'"
                                        data-bs-toggle="modal"
                                        href="#exampleModal2" >Edit</a>

                                   <a  class="modal-effect btn btn-primary delete btn btn-danger btn-sm btn-block"
                                    data-effect="effect-scale"
                                    data-ticketid = "'.$row["TicketTitle"].'"
                                    data-id="'.$row["id"].'"
                                    data-bs-toggle="modal"
                                    href="#modaldemo9" >Delete</a>';

                    return $actionBtn;
                    
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    public function create(Request $request)
    {
       
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
        
        
        $b_exists = DB::table('comments')
        ->where('solving_User', '=', $input['solving_User'])
        ->where('comment_text', '=', $input['comment_text'])
                ->where('ticket_id', '=', $input['ticket_id'])->exists();
                
                if ($b_exists) {
                    
                    session()->flash('Error', 'This Resolve Is Already Existes');
         
                    return redirect()->back();
                    
                } else {
                    
                    comments::create([
                        'solving_User' => $request->solving_User,
                        'comment_text' => $request->comment_text,
                        'ticket_id' => $request->ticket_id,
                'user_id' => $request->user_id,
            ]);
            
            $input = $request->all();
            $id = $request->ticket_id;
            $tickets = tickets::find($id);
            $tickets->update([
                'Ticketstate'            => $request->Ticketstate,
             
            ]);
    
            session()->flash('Add', 'New Resolve has been Addedd');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
   public function editTicketStatus(Request  $request, $id){
    
    $tickets = tickets::find($id);
    $tickets->update([
        'Ticketstate'  => $request->Ticketstate,
     
    ]);

    session()->flash('Add', 'New Resolve has been Addedd');
    return redirect()->back();
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {
     
        $tickets = tickets::find($id);
        $tickets->update([
            'Ticketstate'  => $request->Ticketstate,
         
        ]);

        session()->flash('Add', 'New Resolve has been Addedd');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(comments $comments)
    {
        //
    }
}
