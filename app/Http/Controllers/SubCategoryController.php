<?php

namespace App\Http\Controllers;

use App\sub_category;
use App\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
        $categories = category::paginate(10);
        return view('dashboard.categories', compact('categories'));
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
        $sc = new sub_category;
        $this->validate(
            $request, [
                'sub_category'=>'required|unique:sub_categories',
                'sub_category_eng'=>'required|unique:sub_categories',
                'category_id'=>'required'
                ]
            );
            $sc::create([
                'sub_category' => $request['sub_category'],
                'category_id' => $request['category_id'],
                'sub_category_eng' => $request['sub_category_eng'],
                'sub_category_description'=>$request['sub_category_description'],
                'sub_category_icon'=>$request['sub_category_icon'],
                'created_by'=>Auth::id(),
                'concern_id'=>Auth::user()->concern_id,
                'status'=>'1'
            ]);
           
            session()->flash('message', 'Sub category Created Successfully');
            return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function show(sub_category $sub_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function edit(sub_category $sub_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sub_category $sub_category)
    {
        
        $this->validate(
            $request, [
                'sub_category'=>'required',
                'sub_category_eng'=>'required',
                'category_id'=>'required'
                ]
            );
            $sub_category->update([
                'sub_category' => $request['sub_category'],
                'sub_category_eng' => $request['sub_category_eng'],
                'category_id' => $request['category_id'],
                'sub_category_description'=>$request['sub_category_description'],
                'sub_category_icon'=>$request['sub_category_icon'],
                'updated_by'=>Auth::id(),
                'concern_id'=>Auth::user()->concern_id,
                'status'=>$request->status
            ]);
           
            session()->flash('message', 'Sub category Edited Successfully');
            return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(sub_category $sub_category)
    {
        //
    }
}
