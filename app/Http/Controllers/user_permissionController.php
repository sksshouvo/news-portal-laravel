<?php

namespace App\Http\Controllers;

use App\user_permission;
use App\user;
use App\menu;
use Illuminate\Http\Request;

class user_permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_permission = user_permission::paginate(5);
        
        return view('dashboard.user_permission', compact('user_permission'));
        
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
       $user_permissions = new User_permission;
       $this->validate(
        $request, [
            'user_id'=>'required',
            'main_menu_id'=>'required',
            ]
        );
        $validation = $user_permissions->where([
            ['user_id', '=', $request->user_id],
            ['main_menu_id', '=', $request->main_menu_id],
            ['sub_menu_id', '=', $request->sub_menu_id]
            ])->count();
if($validation>0){
    session()->flash('error', 'Request already exist');
    return redirect('user_permissions');
}else{
    if($request->sub_menu_id!=""){
        foreach($request->sub_menu_id as $sub_menu_id){
            $user_permissions->create([
                'user_id' => $request->user_id,
                'main_menu_id'=>$request->main_menu_id,
                'sub_menu_id'=>$sub_menu_id
            ]);
          }
    }else{
    
        $user_permissions->create([
            'user_id' => $request->user_id,
            'main_menu_id'=>$request->main_menu_id
        ]);  
    }
}

    
       
        session()->flash('message', 'User Permission Created Successfully');
        return redirect('user_permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user_permission  $user_permission
     * @return \Illuminate\Http\Response
     */
    public function show(user_permission $user_permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_permission  $user_permission
     * @return \Illuminate\Http\Response
     */
    public function edit(user_permission $user_permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_permission  $user_permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_permission $user_permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_permission  $user_permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_permission $user_permission)
    {
       
        $user_permission->delete();
        session()->flash('message', 'Deleted Successfully');
        return  redirect('user_permissions');
    }
}
