<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;

use App\User;
class UserController extends Controller
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
        $seconds = 3600;
        Cache::put('salman', user::orderby('id','desc')->paginate(10), $seconds);
        if(Cache::has('salman')){
            $users = Cache::get('salman'); 
        }else{
            $users = user::orderby('id','desc')->paginate(10); 
        }
        
        return view('dashboard.users', compact('users'));
        
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
        $users = new User;
        $this->validate(
            $request, [
                'email'=>'required|unique:users',
                'name'=>'required',
                'password'=>'required',
                'mobile'=>'required|unique:users',
                'country_id'=>'required',
                'desg_id'=>'required',
                'concern_id'=>'required'
                ]
            );
            if(isset($request['new_permission'])){
                $permission = 'desg';
            }else{
                $permission = 'menu';
            }
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'created_by'=>Auth::id(),
                'mobile'=>$request['mobile'],
                'group_id'=>Auth::user()->group_id,
                'desg_id'=>$request['desg_id'],
                'conccern_id'=>$request['concern_id'],
                'country_id'=>$request['country_id'],
                'permission' => $permission,
                'status'=>'1'
            ]);
           
            session()->flash('message', 'User Created Successfully');
            return redirect('users');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $users = user::find($user->id);
        $this->validate(
            $request, [
                'email'=>'required',
                'name'=>'required',
                'mobile'=>'required',
                'country_id'=>'required',
                'desg_id'=>'required',
                'concern_id'=>'required',
                'status'=>'required'
                ]
            );
          
            if($request['password']!=""){
            $password = Hash::make($request['password']);
            }else{
            $password = $users->password;
            }
           
            $users->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $password,
                'updated_by'=>Auth::id(),
                'updated_at'=>date('Y-m-d'),
                'mobile'=>$request['mobile'],
                'group_id'=>Auth::user()->group_id,
                'desg_id'=>$request['desg_id'],
                'concern_id'=>$request['concern_id'],
                'country_id'=>$request['country_id'],
                'permission' => $request['edit_permission'],
                'status'=>$request['status']
                
            ]);
           
            session()->flash('message', 'User Updated Successfully');
            return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
