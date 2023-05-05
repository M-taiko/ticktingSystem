<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\problemestype;
use Illuminate\Http\Request;

class ProblemestypeController extends Controller
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
        return view('problemestype');
    }


    public function getproblemestypeTable(Request $request)
    {
        if ($request->ajax()) {


            $data = problemestype::select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '

                                        <a  class="modal-effect btn btn-primary delete btn btn-primary btn-sm btn-block"
                                        data-effect="effect-scale"
                                        data-problemname = "'.$row["ProblemName"].'"
                                        data-problemtype = "'.$row["ProblemType"].'"
                                        data-id="'.$row["id"].'"
                                        data-bs-toggle="modal"
                                        href="#exampleModal2" >Edit</a>

                                   <a  class="modal-effect btn btn-primary delete btn btn-danger btn-sm btn-block"
                                    data-effect="effect-scale"
                                    data-problemname = "'.$row["ProblemName"].'"
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
        $b_exists = problemestype::where('ProblemName', '=', $input['ProblemName'])->exists();

        if ($b_exists) {

            session()->flash('Error', 'Department Is Already Existes');
            return redirect('/problemestype');

        } else {

            problemestype::create([
                'ProblemName' => $request->ProblemName,
                'ProblemType' => $request->ProblemType,
      


            ]);
            session()->flash('Add', ' Problem Type has been Addedd');

            return redirect('/problemestype');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\problemestype  $problemestype
     * @return \Illuminate\Http\Response
     */
    public function show(problemestype $problemestype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\problemestype  $problemestype
     * @return \Illuminate\Http\Response
     */
    public function edit(problemestype $problemestype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\problemestype  $problemestype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'ProblemName'              => 'required|max:255|unique:problemestypes,ProblemName,'.$id,
            'ProblemType'              => 'required'
          
        ],[

            'ProblemName.required' =>'You Should Enter  Problem Name',
            'ProblemName.unique' =>'Problem Already reacorded',
            'ProblemType.required' =>' You Should Enter  Problem Type   ',
          

        ]);

        $departmentes = problemestype::find($id);
        $departmentes->update([
            'ProblemName'            => $request->ProblemName,
            'ProblemType'            => $request->ProblemType,
       
        ]);

        session()->flash('edit','Department Had Been Edited Successfully');

        return redirect('/problemestype');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\problemestype  $problemestype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        problemestype::find($id)->delete();
        session()->flash('delete','Problem Has Been Deleted');
        return redirect('/problemestype');
    }
}
