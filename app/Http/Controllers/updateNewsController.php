<?php

namespace App\Http\Controllers;

use App\news_table;
use App\set_as;
use App\set_as_breaking_news;
use Illuminate\Http\Request;

class updateNewsController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\news_table  $news_table
     * @return \Illuminate\Http\Response
     */
    public function show(news_table $news_table, $id)
    {
        $edit_news =  $news_table::find($id);
        $set_as = set_as::where('news_id', $id)->first();
        $set_as_br_n = set_as_breaking_news::where('news_id', $id)->first();
        return view('dashboard.edit_news', compact('edit_news', 'set_as', 'set_as_br_n'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news_table  $news_table
     * @return \Illuminate\Http\Response
     */
    public function edit(news_table $news_table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\news_table  $news_table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news_table $news_table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\news_table  $news_table
     * @return \Illuminate\Http\Response
     */
    public function destroy(news_table $news_table)
    {
        //
    }
}
