<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\social_media;
use Illuminate\Support\Facades\Auth;
class socialMediaController extends Controller
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
        $social_media = social_media::paginate(5);
        return view('dashboard.social_media', compact('social_media'));
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
        
        $this->validate(
            $request, [
                'site_name'=>'required||Unique:social_medias',
                'site_url'=>'required||Unique:social_medias',
                'site_icon'=>'required||Unique:social_medias',
               
            ]
            );
        social_media::create([
            'site_name' => $request['site_name'],
            'site_url' => $request['site_url'],
            'site_icon' => $request['site_icon'],
            'created_by' => Auth::id()
        ]);
        
        session()->flash('message', 'Social Sites Created Successfully');
        return redirect('social_medias');
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
        $sm = social_media::find($id);
       
        $this->validate(
            $request, [
                'site_name'=>'required',
                'site_url'=>'required',
                'site_icon'=>'required',
            ]
            );
        $sm->update([
            'site_name' => $request['site_name'],
            'site_url' => $request['site_url'],
            'site_icon' => $request['site_icon'],
            'created_by' => AUth::id()
        ]);
        
        session()->flash('message', 'Social Sites Update Successfully');
        return redirect('social_medias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sm = social_media::find($id);
        $sm->delete();
        return redirect('social_medias');
    }
}
