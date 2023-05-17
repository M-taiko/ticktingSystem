<?php

namespace App\Http\Controllers;

use App\Models\priorities;
use Illuminate\Http\Request;

class PrioritiesController extends Controller
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
        $priorities = priorities::all(); 
        return view('priorities' , compact('priorities'));
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
        $b_exists = priorities::where('name', '=', $input['name'])->exists();

        if ($b_exists) {

            session()->flash('Error', 'prioritie  Is Already Existes');
            return redirect('/priorities');

        } else {

            priorities::create([
                'name' => $request->name,
                'color' => $request->color,
                


            ]);
            session()->flash('Add', ' prioritie has been Addedd');

            return redirect('/priorities');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\priorities  $priorities
     * @return \Illuminate\Http\Response
     */
    public function show(priorities $priorities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\priorities  $priorities
     * @return \Illuminate\Http\Response
     */
    public function edit(priorities $priorities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\priorities  $priorities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, priorities $priorities)
    {
        $id = $request->id;

        $this->validate($request, [

            'name'              => 'required|max:255|unique:priorities,name,'.$id,
            'color'              => 'required'
         
        ],[

            'name.required' =>'You Should Enter   Name',
            'name.unique' =>'name Already reacorded',
            'color.required' =>' You Should pick  color   ',
         

        ]);

        $priorities = priorities::find($id);
        $priorities->update([
            'name'            => $request->name,
            'color'            => $request->color,
           
        ]);

        session()->flash('edit','prioritie Had Been Edited Successfully');
        return redirect('/priorities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\priorities  $priorities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        priorities::find($id)->delete();
        session()->flash('delete','Department Has Been Deleted');
        return redirect('/priorities');
    }
}
