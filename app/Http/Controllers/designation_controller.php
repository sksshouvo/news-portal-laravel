<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\designation;
class designation_controller extends Controller
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
        $designation = designation::orderby('id', 'desc')->paginate(5);
        return view('dashboard.designation', compact('designation'));        
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
        $dd = new designation;
        $this->validate(
            $request, [
                'designation'=>'required|unique:designations',
              
                ]
            );
            $dd::create([
                'designation' => $request['designation'],
                'created_by'=>Auth::id()
            ]);
           
            session()->flash('message', 'User Created Successfully');
            return redirect('designation');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(designation $designation)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(designation $designation)
    {
        return $designation->designation;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, designation $designation)
    {
        
        $dd = designation::find($designation->id);
        $this->validate(
            $request, [
                'designation'=>'required||Unique:designations',
               
            ]
            );
        $dd->update([
            'designation' => $request['designation'],
        ]);
        
        session()->flash('message', 'Designation Update Successfully');
        return redirect('designation');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(designation $designation)
    {
        //
    }
}
