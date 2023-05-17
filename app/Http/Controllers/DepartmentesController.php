<?php

namespace App\Http\Controllers;

use App\Models\departmentes;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartmentesController extends Controller
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
        return view('departmentes');
    }

    public function getdepartmentesTable(Request $request)
    {
        if ($request->ajax()) {


            $data = departmentes::query();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '

                                        <a  class="modal-effect btn btn-primary delete btn btn-primary btn-sm btn-block"
                                        data-effect="effect-scale"
                                        data-departmentname = "'.$row["DepartmentName"].'"
                                        data-departmenthead = "'.$row["DepartmentHead"].'"
                                        data-departmentarea = "'.$row["DepartmentArea"].'"
                                        data-id="'.$row["id"].'"
                                        data-bs-toggle="modal"
                                        href="#exampleModal2" >Edit</a>

                                   <a  class="modal-effect btn btn-primary delete btn btn-danger btn-sm btn-block"
                                    data-effect="effect-scale"
                                    data-departmentname = "'.$row["DepartmentName"].'"
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
        $b_exists = departmentes::where('DepartmentName', '=', $input['DepartmentName'])->exists();

        if ($b_exists) {

            session()->flash('Error', 'Department Is Already Existes');
            return redirect('/departmentes');

        } else {

            departmentes::create([
                'DepartmentName' => $request->DepartmentName,
                'DepartmentHead' => $request->DepartmentHead,
                'DepartmentArea' => $request->DepartmentArea,


            ]);
            session()->flash('Add', ' Department has been Addedd');

            return redirect('/departmentes');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\departmentes  $departmentes
     * @return \Illuminate\Http\Response
     */
    public function show(departmentes $departmentes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\departmentes  $departmentes
     * @return \Illuminate\Http\Response
     */
    public function edit(departmentes $departmentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\departmentes  $departmentes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'DepartmentName'              => 'required|max:255|unique:departmentes,DepartmentName,'.$id,
            'DepartmentHead'              => 'required',
            'DepartmentArea'              => 'required'
        ],[

            'DepartmentName.required' =>'You Should Enter  Department Name',
            'DepartmentName.unique' =>'Department Already reacorded',
            'DepartmentHead.required' =>' You Should Enter  DepartmentHead   ',
            'DepartmentArea.required' =>'You Should Enter  DepartmentArea',

        ]);

        $departmentes = departmentes::find($id);
        $departmentes->update([
            'DepartmentName'            => $request->DepartmentName,
            'DepartmentHead'            => $request->DepartmentHead,
            'DepartmentArea'            => $request->DepartmentArea,
        ]);

        session()->flash('edit','Department Had Been Edited Successfully');
        return redirect('/departmentes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\departmentes  $departmentes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request )
    {
        $id = $request->id;
        departmentes::find($id)->delete();
        session()->flash('delete','Department Has Been Deleted');
        return redirect('/departmentes');
    }
}