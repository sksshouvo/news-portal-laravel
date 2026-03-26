<?php

namespace App\Http\Controllers;

use App\news_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\tag;
use App\category;
use App\sub_category;
use App\postCategoryNSubcategory;
use App\f_image;
use App\set_as;
use App\set_as_breaking_news;
use DB;
class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.news');
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
        $news = new news_table;
        $this->validate(
            $request, [
                'post_title_bng'=>'unique:news_table',
                'post_url_bng'=>'unique:news_table',
                'post_type'=>'required',
                'post_status'=>'required',
                'category_id'=>'required',
                'f_image'=>'mimes:jpeg,jpg,png,gif|required|dimensions:max_width=600,max_height=400,min_width=600,min_height=400'
                ]
            );
            $news->create([
            'post_title_bng'=>$request['post_title_bng'],
            'post_url_bng'=>$request['post_url_bng'],
            'post_content_bng'=>$request['post_content_bng'],
            'post_type'=>$request['post_type'],
            'post_status'=>$request['post_status'],
            'post_title_eng'=>$request['post_title_eng'],
            'post_url_eng'=>$request['post_url_eng'],
            'post_content_eng'=>$request['post_content_eng'],
            'news_by'=>$request['news_by'],
            'meta_description_bng'=>$request['meta_description_bng'],
            'meta_description_eng'=>$request['meta_description_eng'],
            'limit_description_bng'=>$request['limit_description_bng'],
            'limit_description_eng'=>$request['limit_description_eng'],
            'sub_title_eng'=>$request['sub_title_eng'],
            'sub_title_bng'=>$request['sub_title_bng'],
            'sub_title_bng_position'=>$request['sub_title_bng_position'],
            'sub_title_eng_position'=>$request['sub_title_eng_position'],
            'entry_by'=>Auth::id()
            ]);
            $for_id = $news::where([
                ['post_url_bng',$request['post_url_bng']],
                ['post_url_eng', $request['post_url_eng']]
            ])->first();

            
        $tags = new tag;
        $new_tags = explode(',', $request['tags']);
        foreach($new_tags as $ex_tags){
            $tags->create([
            'tags'=>$ex_tags,
            'post_id'=>$for_id->id,
            ]);
        }
        if($request['sub_categories_id']!=""){
            $postCategoryNSubcategory = new postCategoryNSubcategory;
            foreach($request['sub_categories_id'] as $newsc){
                $cat_id = sub_category::where('id', '=', $newsc)->select('category_id')->first();
                $postCategoryNSubcategory->create([
                'news_id'=>$for_id->id,
                'category_id'=>$cat_id->category_id,
                'sub_category_id'=>$newsc
                ]);
            }
        }else{
            $postCategoryNSubcategory = new postCategoryNSubcategory;
            foreach($request['category_id'] as $catss){
                $postCategoryNSubcategory->create([
                    'news_id'=>$for_id->id,
                    'category_id'=>$catss
                    ]);
            };
        }
      if($request->hasFile('f_image')){
            $request->file('f_image');
            $request->f_image->storeAs('public/news_post', $for_id->id.".".$request->file('f_image')->extension());
            $f_images = new f_image;
            $f_images->create([
            'post_id'=>$for_id->id,
            'image_name'=>$for_id->id.".".$request->file('f_image')->extension(),
            'image_path'=>'app/public/news_post/',
            'image_caption'=>$request->image_caption
            ]);
            
        }
        $news_id = $news::where('post_url_bng', $request['post_url_bng'])->select('id')->first();
        if($request['set_as']!=""){
        $dsa = set_as::where('set_as', '=', $request['set_as'])->first();
        
        if($dsa!=""){
            $dsa->delete();    
        }
            $set_as = new set_as;
            $set_as->create([
            'set_as'=>$request['set_as'],
            'news_id'=>$news_id->id,
            'entry_by'=>Auth::id()
            ]);
        }
        if($request->set_as_breaking_news!=""){

            $set_as_bn = new set_as_breaking_news;
       
           
            $set_as = $request->set_as_breaking_news;
            $dsa = $set_as_bn::count();
           
            if($dsa>=2){
            DB::table('set_as_breaking_news')->delete();    
            }
            
    
            $set_as_bn::create([
                'news_id' =>$news_id->id,
                'set_as'=>$set_as,
                'created_by' => Auth::id()
            ]);
 
    }       
       session()->flash('message', 'News Created Successfully');
        return redirect('news');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\news_table  $news_table
     * @return \Illuminate\Http\Response
     */
    public function show(news_table $news_table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news_table  $news_table
     * @return \Illuminate\Http\Response
     */
    public function edit(news_table $news_table, $id)
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
