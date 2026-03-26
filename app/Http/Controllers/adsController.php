<?php

namespace App\Http\Controllers;

use App\ad;
use Illuminate\Http\Request;

class adsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = ad::paginate(5);
        return view('dashboard.ad', compact('ads'));
        
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
        $ads = new ad;

        $this->validate(
            $request, [
                'ad_title'=>'required|unique:ads',
                ]
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(ad $ad)
    {
        //
    }
}
