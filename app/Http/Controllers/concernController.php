<?php

namespace App\Http\Controllers;

use App\concern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class concernController extends Controller
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
        $concern = concern::paginate(5);
        return view('dashboard.concern', compact('concern'));
        
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
        $cc = new concern;
        $this->validate(
            $request, [
                'concern_name'=>'required|unique:portal_concern',
              
                ]
            );
            $cc::create([
                'concern_name' => $request['concern_name'],
                'created_by'=>Auth::id()
            ]);
           
            session()->flash('message', 'Concern Created Successfully');
            return redirect('concern');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function show(concern $concern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function edit(concern $concern)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, concern $concern)
    {
        $dd = concern::find($concern->id);
        $this->validate(
            $request, [
                'concern_name'=>'required||Unique:portal_concern',
               
            ]
            );
        $dd->update([
            'concern_name' => $request['concern_name'],
        ]);
        
        session()->flash('message', 'Concern Update Successfully');
        return redirect('concern');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function destroy(concern $concern)
    {
        //
    }
    public function ajax(){
        return "HI";
    }
}
