<?php
namespace App\Http\Controllers;
use App\set_as;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class setAsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $set_as = set_as::orderBy('id', 'desc')->paginate(10);
    return view('dashboard.set_as', compact('set_as'));
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
        $request, ['set_as'=>'required','news_id'=>'required']);
        $dsa = set_as::where('set_as', '=', $request['set_as'])->first();
        
        if($dsa!=""){
            $dsa->delete();    
        }
        

        set_as::create([
            'set_as' => $request['set_as'],
            'news_id' => $request['news_id'],
            'created_by' => Auth::id()
        ]);
        
        session()->flash('message', 'News is been updated');
        return redirect('set_as');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\set_as  $set_as
     * @return \Illuminate\Http\Response
     */
    public function show(set_as $set_as)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\set_as  $set_as
     * @return \Illuminate\Http\Response
     */
    public function edit(set_as $set_as)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\set_as  $set_as
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, set_as $set_as)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\set_as  $set_as
     * @return \Illuminate\Http\Response
     */
    public function destroy(set_as $set_as)
    {
        //
    }
}
