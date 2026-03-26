<?php

namespace App\Http\Controllers;

use App\sub_menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubMenuController extends Controller
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
        //
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
        $sub_menus = new sub_menu;
        
        $this->validate(
            $request, [
                'sub_menu_name'=>'required|unique:sub_menus',
                'main_menu_id'=>'required',
                'sub_menu_url'=>'required|unique:sub_menus',

                ]
        );
        $sub_menus::create([
            'sub_menu_name' => $request->sub_menu_name,
            'main_menu_id'=>$request->main_menu_id,
            'sub_menu_url'=>$request->sub_menu_url,
            'icon'=>$request->sub_menu_icon,
            'created_by'=>Auth::id(),
            'concern_id'=>Auth::user()->concern_id,
            'status'=>'1'
        ]);
       
        session()->flash('message', 'Sub Menu Created Successfully');
        return redirect('menus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sub_menu  $sub_menu
     * @return \Illuminate\Http\Response
     */
    public function show(sub_menu $sub_menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sub_menu  $sub_menu
     * @return \Illuminate\Http\Response
     */
    public function edit(sub_menu $sub_menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sub_menu  $sub_menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sub_menu $sub_menu)
    {
        $this->validate(
            $request, [
                'sub_menu_name'=>'required',
                'main_menu_id'=>'required',
                'sub_menu_url'=>'required'
                ]
        );
        $sub_menu->update([
            'sub_menu_name' => $request->sub_menu_name,
            'main_menu_id'=>$request->main_menu_id,
            'sub_menu_url'=>$request->sub_menu_url,
            'icon'=>$request->sub_menu_icon,
            'modify_by'=>Auth::id(),
            'concern_id'=>Auth::user()->concern_id,
            'status'=>$request->status
        ]);

        session()->flash('message', 'Sub Menu Updated Successfully');
        return redirect('menus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sub_menu  $sub_menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(sub_menu $sub_menu)
    {
        //
    }
}
