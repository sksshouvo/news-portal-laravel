<?php

namespace App\Http\Controllers;

use App\category;
use App\sub_category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class categoryController extends Controller
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
        $cat = new category;
        $this->validate(
            $request, [
                'category'=>'required|unique:categories',
                
                'category_eng'=>'required|unique:categories'
                ]
            );
            $cat::create([
                'category' => $request['category'],
                'category_eng' => $request['category_eng'],
                'category_description'=>$request['category_description'],
                'category_icon'=>$request['category_icon'],
                'created_by'=>Auth::id(),
                'concern_id'=>Auth::user()->concern_id,
                'status'=>'1'
            ]);
           
            session()->flash('message', 'Category Created Successfully');
            return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        
        $this->validate(
            $request, [
                'category'=>'required',
                
                'category_eng'=>'required'
                ]
            );
            $category->update([
                'category' => $request['category'],
                'category_eng' => $request['category_eng'],
                'category_description'=>$request['category_description'],
                'category_icon'=>$request['category_icon'],
                'updated_by'=>Auth::id(),
                'concern_id'=>Auth::user()->concern_id,
                'status'=>$request->status
            ]);
           
            session()->flash('message', 'Category updated Successfully');
            return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
    
}
