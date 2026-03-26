<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\news_table;
use App\user;
use App\visitor;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_news = news_table::count();
        $draft_news = news_table::where('post_status', '=', 0)->count();
        $users = user::count();
        $published_news = news_table::where('post_status', '=', 1)->count();
        $site_traffic_data =DB::table('visitors')->where(DB::raw('YEAR(created_at)'), date("Y"))
        ->select(DB::raw('MONTHNAME(created_at) as month_name, sum(visit_count) as all_visitors'))->groupby('month_name')->orderby('created_at', 'asc')
        ->get();
        $all_visiotr = visitor::join('news_table', 'news_table.id', 'visitors.news_id')->groupby('visitors.ip_address','visitors.news_id')->orderby('visitors.visit_count', 'desc')->paginate(10);

        return view('/dashboard.dashboard', compact('all_news', 'draft_news', 'published_news', 'users', 'site_traffic_data', 'all_visiotr'));
    }
}
