<?php

namespace App\Http\Controllers;
use App\set_as_cat;
use App\set_as_sub_cat;
use App\news_table;
use App\category;
use App\sub_category;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class setAsSubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $set_as_sub_cat = set_as_sub_cat::join('news_table', 'news_table.id', 'news_id')
        ->join('categories', 'categories.id', 'category_id')
        ->join('sub_categories', 'sub_categories.id', 'sub_category_id')
        ->paginate(10);
        $cnsc = sub_category::join('categories', 'categories.id', 'category_id')
        ->select('sub_categories.id as sub_cat_id', 'sub_categories.*','categories.id as cat_id' ,'categories.*')
        ->get();
       return view('dashboard.set_as_sub_cat', compact('set_as_sub_cat','cnsc'));
     
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
            $request, ['news_id'=>'required', 'sub_category_id'=>'required']
        );
            $all_sub_cat = sub_category::find($request['sub_category_id']);

            $dsa = set_as_sub_cat::where([['sub_category_id',$all_sub_cat->id],['category_id', $all_sub_cat->category_id]])->count();
           
            if($dsa>=2){
                DB::table('set_as_sub_cat')->where([['sub_category_id',$all_sub_cat->id],['category_id', $all_sub_cat->category_id]])->delete();    
            }
            
    
            set_as_sub_cat::create([
                'news_id' => $request['news_id'],
                'sub_category_id'=>$request['sub_category_id'],
                'category_id'=>$all_sub_cat->category_id,
                'created_by' => Auth::id()
            ]);
            
            session()->flash('message', 'News is been updated');
            return redirect('set_as_sub_cat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\set_as_sub_cat  $set_as_sub_cat
     * @return \Illuminate\Http\Response
     */
    public function show(set_as_sub_cat $set_as_sub_cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\set_as_sub_cat  $set_as_sub_cat
     * @return \Illuminate\Http\Response
     */
    public function edit(set_as_sub_cat $set_as_sub_cat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\set_as_sub_cat  $set_as_sub_cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, set_as_sub_cat $set_as_sub_cat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\set_as_sub_cat  $set_as_sub_cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(set_as_sub_cat $set_as_sub_cat)
    {
        //
    }
}
