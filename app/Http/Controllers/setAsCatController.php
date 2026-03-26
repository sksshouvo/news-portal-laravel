<?php

namespace App\Http\Controllers;

use App\set_as_cat;
use App\news_table;
use App\category;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class setAsCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $set_as_cat = set_as_cat::join('news_table', 'news_table.id', 'news_id')
        ->join('categories', 'categories.id', 'category_id')
        ->groupBy('news_id')
        ->paginate(10);
        $all_news = news_table::all();
        $all_cat = category::all();
       return view('dashboard.set_as_cat', compact('set_as_cat', 'all_news', 'all_cat'));
     
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
        $set_as_cat = new set_as_cat;
        $this->validate(
            $request, ['news_id'=>'required', 'category_id'=>'required']
        );
            $dsa = set_as_cat::where('category_id', $request->category_id)->count();
           
            if($dsa>=2){
                DB::table('set_as_cat')->where('category_id', $request->category_id)->delete();    
            }
            
    
            set_as_cat::create([
                
                'news_id' => $request['news_id'],
                'category_id'=>$request['category_id'],
                'created_by' => Auth::id()
            ]);
            
            session()->flash('message', 'News is been updated');
           return redirect('set_as_cat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\set_as_cat  $set_as_cat
     * @return \Illuminate\Http\Response
     */
    public function show(set_as_cat $set_as_cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\set_as_cat  $set_as_cat
     * @return \Illuminate\Http\Response
     */
    public function edit(set_as_cat $set_as_cat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\set_as_cat  $set_as_cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, set_as_cat $set_as_cat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\set_as_cat  $set_as_cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(set_as_cat $set_as_cat)
    {
        //
    }
}
