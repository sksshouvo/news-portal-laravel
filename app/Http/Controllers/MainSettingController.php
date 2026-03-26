<?php
namespace App\Http\Controllers;
use App\main_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class MainSettingController extends Controller
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
        $main_settings = main_setting::paginate(5);
        return view('dashboard.main_settings', compact('main_settings'));
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
     * @param  \App\main_setting  $main_setting
     * @return \Illuminate\Http\Response
     */
    public function show(main_setting $main_setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\main_setting  $main_setting
     * @return \Illuminate\Http\Response
     */
    public function edit(main_setting $main_setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\main_setting  $main_setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, main_setting $main_setting)
    {
        $ms = main_setting::find($main_setting->id);
        
        $this->validate(
            $request, [
                'title'=>'required',
                'description'=>'required',
                'support_mail'=>'required',
                'info_mail'=>'required',
                'keywords'=>'required',
                'mail_driver'=>'required',
                'mail_host'=>'required',
                'mail_port'=>'required',
                'mail_username'=>'required',
                'mail_password'=>'required',
                'mail_encryption'=>'required',
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
            ]
            );
           
        
        $ms->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'support_mail' => $request['support_mail'],
            'info_mail' => $request['info_mail'],
            'keywords' => $request['keywords'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            
            'header_for_seo' => $request['header_for_seo'],
            'mail_driver' => $request['mail_driver'],
            'mail_host' => $request['mail_host'],
            'mail_port' => $request['mail_port'],
            'mail_username' => $request['mail_username'],
            'mail_password' => $request['mail_password'],
            'mail_encryption' => $request['mail_encryption'],
        
        ]);
        if($request->hasFile('logo')){
            $request->file('logo');
            $request->logo->storeAs('public', 'logo.png');
        }

        session()->flash('message', 'Main Settings Update Successfully');
        return redirect('main_settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\main_setting  $main_setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(main_setting $main_setting)
    {
        //
    }
}
