<?php

namespace App\Http\Controllers;

use App\news_table;
use App\set_as;
use App\f_image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;

class sksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
$seconds = 3000;
$set_as = set_as::whereIn('set_as', ['lead_news_1','lead_news_2','lead_news_3'])->orderBy('set_as', 'asc')->get();
// feature news
$fn_image = f_image::where('post_id', $set_as[0]->news_id)->first();
$img1 = \Storage::url($fn_image->image_path.$fn_image->image_name);
$f_news = news_table::find($set_as[0]->news_id);
// feature news
// caption news 1
$cn_image1 = f_image::where('post_id', $set_as[1]->news_id)->first();
$img2 = \Storage::url($cn_image1->image_path.$cn_image1->image_name);
$c_news1 = news_table::find($set_as[1]->news_id);
// caption news 1
// caption news 2
$cn_image2 = f_image::where('post_id', $set_as[2]->news_id)->first();
$img3 = \Storage::url($cn_image2->image_path.$cn_image2->image_name);
$c_news2 = news_table::find($set_as[2]->news_id);
// caption news 2
$line = strip_tags($c_news1->meta_description_bng);
$truncated = Str::limit($line, $c_news1->limit_description_bng, '....');
$line2 = strip_tags($c_news2->meta_description_bng);
$truncated2 = Str::limit($line2, $c_news1->limit_description_bng, '....');
return view('main_site.index', compact('set_as', 'img1','f_news', 'img2', 'c_news1', 'img3', 'c_news2', 'seconds','truncated', 'truncated2'));
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
     * @param  \news_table  $news_table
     * @return \Illuminate\Http\Response
     */
    public function show(news_table $news_table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \news_table  $news_table
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
     * @param  \news_table  $news_table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news_table $news_table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \news_table  $news_table
     * @return \Illuminate\Http\Response
     */
    public function destroy(news_table $news_table)
    {
        //
    }
}
