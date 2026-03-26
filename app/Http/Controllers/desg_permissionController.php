<?php

namespace App\Http\Controllers;

use App\desg_permission;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class desg_permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desg_permission = desg_permission::paginate(5);
        return view('dashboard.desg_permission', compact('desg_permission'));
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
        $desg = new desg_permission;
        $this->validate(
            $request, [
                'desg_id'=>'required',
                'main_menu_id'=>'required',
              ]
            );

        $validation = $desg->where([
        ['desg_id', '=', $request->desg_id],
        ['main_menu_id', '=', $request->main_menu_id],
        ['sub_menu_id', '=', $request->sub_menu_id]

        ])->count();

        if($validation>0){
                session()->flash('error', 'Request already exist');
                return redirect('desg_permissions');

        }else{
          if($request->sub_menu_id!=""){
            foreach($request['sub_menu_id'] as $sub_menu_id){

                $desg::create([
                    'desg_id' => $request['desg_id'],
                    'main_menu_id'=>$request['main_menu_id'],
                    'sub_menu_id'=>$sub_menu_id,
                    'created_by'=>Auth::id(),
                    'concern_id'=>Auth::user()->concern_id,
                ]);
              }
          }else{
            $desg::create([
                'desg_id' => $request['desg_id'],
                'main_menu_id'=>$request['main_menu_id'],
                'created_by'=>Auth::id(),
                'concern_id'=>Auth::user()->concern_id,
            ]);
          }
               
                session()->flash('message', 'Designation Created Successfully');
                return redirect('desg_permissions');
        }
          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\desg_permission  $desg_permission
     * @return \Illuminate\Http\Response
     */
    public function show(desg_permission $desg_permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\desg_permission  $desg_permission
     * @return \Illuminate\Http\Response
     */
    public function edit(desg_permission $desg_permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\desg_permission  $desg_permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, desg_permission $desg_permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\desg_permission  $desg_permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(desg_permission $desg_permission)
    {
        $desg_permission->delete();
        session()->flash('message', 'Deleted Successfully');
        return  redirect('desg_permissions');
    }
}
