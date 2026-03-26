<?php

namespace App\Http\Controllers;


use App\concern;

use App\designation;
use App\user;
use App\sub_menu;
use App\sub_category;
use App\tag;
use App\news_table;
use App\postCategoryNSubcategory;
use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ajaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function concern(){
        $all_data = concern::all();
        return $all_data;
    }
    public function desg(){
        $all_data_desg = designation::all();
        return $all_data_desg;
    }
    public function edit_user(Request $request){
        $all_data_user = user::find($request->user_id);
        return $all_data_user;
    }
    public function get_sub_menu(Request $request){
    $all_sub_menu = sub_menu::where('main_menu_id', '=', $request->main_menu_id)->get();
    return $all_sub_menu;
    }
    public function get_sub_category(Request $request){
    $all_sub_category = sub_category::whereIn('category_id', $request->category_id)->get();
    return $all_sub_category;
    }
    public function get_news_under_cat(Request $request){
    $all_news_under_cat = postCategoryNSubcategory::join('news_table', 'news_table.id', 'news_id')
    ->join('categories','categories.id', 'category_id')
    ->where('category_id', $request->category_id)
    ->groupby('news_id')
    ->get();
    return $all_news_under_cat;
    }

    public function get_news_under_sub_cat(Request $request){
        $all_news_under_cat = postCategoryNSubcategory::join('news_table', 'news_table.id', 'news_id')
        ->join('sub_categories','sub_categories.id', 'sub_category_id')
        ->where('sub_category_id', $request->sub_category_id)
        ->groupby('news_id')
        ->get();
        return $all_news_under_cat;
        }

    public function set_as(Request $request){
        $last_data = news_table::where('set_as', $request->set_as_id)->select('id')->first();
        if($last_data['id']>0){
        DB::table('news_table')->where('id','=',$last_data['id'])->update(['set_as' => ""]);    
        $news = DB::table('news_table')->where('id','=',$request->news_id)->update(['set_as' => $request->set_as_id]);
        }else{
        $news = DB::table('news_table')->where('id','=',$request->news_id)->update(['set_as' => $request->set_as_id]);    
        }
        
        
        if($news){
        return "1";
        }

        return $request;
        
      
        
    }

    public function make_slug(Request $request){
    //$slug = Str::slug($request->url_value, '_');
    $slug = str_replace(' ', '_', $request->url_value);
    return json_encode($slug);
    }

    public function get_traffic_data(Request $request){
     $site_traffic_data =DB::table('visitors')->where(DB::raw('YEAR(created_at)'), $request['year'])
    ->select(DB::raw('MONTHNAME(created_at) as month_name, sum(visit_count) as all_visitors'))->groupby('month_name')
    ->get();
    return $site_traffic_data;
    }
  
}
