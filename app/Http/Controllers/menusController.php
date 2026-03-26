<?php

namespace App\Http\Controllers;

use App\menu;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Jsonable;
class menusController extends Controller
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
        $menus = menu::paginate(5);

        return view('dashboard.menus', compact('menus'));
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
        $menus = new menu;
        
            $this->validate(
                $request, [
                    'menu_name'=>'required|unique:menus',
                    
                    'menu_url'=>'required|unique:menus',
                    
                    'icon'=>'required',
                    ]
            );
            $menus::create([
                'menu_name' => $request->menu_name,
                'menu_url'=>$request->menu_url,
                'icon'=>$request->icon,
                'created_by'=>Auth::id(),
                'concern_id'=>Auth::user()->concern_id,
                'status'=>'1'
            ]);
           
            session()->flash('message', 'Menu Created Successfully');
            return redirect('menus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, menu $menu)
    {
        $this->validate(
            $request, [
                'menu_name'=>'required',
                
                'menu_url'=>'required',
                
                'icon'=>'required',
                
                'status'=>'required',
                ]
            );
            $menu->update([
                'menu_name' => $request['menu_name'],
                'menu_url'=>$request['menu_url'],
                'icon'=>$request['icon'],
                'updated_by'=>Auth::id(),
                'concern_id'=>Auth::user()->concern_id,
                'status'=>$request->status
            ]);
           
            session()->flash('message', 'Menu updated Successfully');
            return redirect('menus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu $menu)
    {
        //
    }
}
