<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\set_as_breaking_news;
use App\news_table;
use Illuminate\Support\Facades\Auth;
use DB;
class setAsBreakingNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_news = news_table::all();

        
        $set_as_breaking_news = set_as_breaking_news::join('news_table', 'news_table.id','set_as_breaking_news.news_id')->orderBy('set_as_breaking_news.id', 'desc')->orderby('news_table.id', 'desc')->limit(100)->paginate(10);
        return view('dashboard.set_as_breaking_news', compact('set_as_breaking_news', 'all_news'));
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
        $set_as_bn = new set_as_breaking_news;
        $this->validate(
            $request, ['news_id'=>'required', 'set_as'=>'required']
        );
           
            $set_as = $request->set_as;
            $dsa = $set_as_bn::count();
           
            if($dsa>=2){
            DB::table('set_as_breaking_news')->delete();    
            }
            
    
            $set_as_bn::create([
                'news_id' => $request['news_id'],
                'set_as'=>$set_as,
                'created_by' => Auth::id()
            ]);
            
            session()->flash('message', 'News is been set as Breaking news');
            return redirect('set_as_breaking_news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
