<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\concern;
use App\designation;
use App\user;
use App\sub_menu;
use App\sub_category;
use App\category;
use App\tag;
use App\set_as;
use App\set_as_cat;
use App\set_as_sub_cat;
use App\news_table;
use App\f_image;
use App\postCategoryNSubcategory;
use App\visitor;
use DB;

class ajaxControllerForMainSite extends Controller
{
    public function get_all_tags(Request $request){
        $all_tags = tag::select('tags')->groupBy('tags')->get();
        return $all_tags;
        }

        
	public function caption_news_section(Request $request){
        $set_as  = set_as::whereIn('set_as', ['caption_news_1','caption_news_2','caption_news_3' ])->orderBy('set_as', 'asc')->get();
        foreach($set_as as $key=>$sa){
        $cn_image = f_image::where('post_id', $sa->news_id)->first();
        $all_news[$key]['img'] = Storage::url($cn_image->image_path.$cn_image->image_name);
        $all_news[$key]['news']= news_table::find($sa->news_id);
        }
        return $all_news;
        }
    public function sastho_seba_section(Request $request){
            $set_as  = set_as::whereIn('set_as', ['s_lead_news_1','s_lead_news_2'])->orderBy('set_as', 'asc')->get();
            foreach($set_as as $key=>$sa){
            $cn_image = f_image::where('post_id', $sa->news_id)->first();
            $all_news[$key]['img']=Storage::url($cn_image->image_path.$cn_image->image_name);
            $all_news[$key]['news']=news_table::find($sa->news_id);
            }
            return $all_news;
        }
    public function s_caption_news(Request $request){
            $set_as  = DB::table('news_table')
            ->select('news_table.id as news_id','news_table.post_title_bng', 'categories.category')
            ->join('news_category_n_sub_categories', 'news_category_n_sub_categories.news_id', 'news_table.id')
            ->join('categories', 'categories.id', 'news_category_n_sub_categories.category_id')
            ->where('categories.id', 1)
            ->groupby('news_table.id')
            ->orderby('news_table.id', 'desc')
            ->limit(4)
            ->get();
            foreach($set_as as $key=>$sa){
            $cn_image = f_image::where('post_id', $sa->news_id)->first();
            $all_news[$key]['c_news']['img'] = Storage::url($cn_image->image_path.$cn_image->image_name);
            $all_news[$key]['c_news']['news']= news_table::find($sa->news_id);
            }
            return $all_news;
        }
    public function popular_news(Request $request){
			$popurlar_news = visitor::select(DB::raw('sum(visit_count) as all_v_count, news_id'))->groupBy('news_id')->limit($request->limit)->orderBy('all_v_count', 'desc')->limit(20)->get();
			foreach($popurlar_news as $ll=>$pn){
			$pn_image = f_image::where('post_id', $pn->news_id)->first();
            $all_news[$ll]['pn_news']['img'] = Storage::url($pn_image->image_path.$pn_image->image_name);
			$all_news[$ll]['pn_news']['news']= news_table::find($pn->news_id);
            }
			return($all_news);
			}
	public function last_news(){
			$last_news = news_table::where('post_type', '1')->orderBy('id', 'desc')->limit(20)->get();
			foreach($last_news as $ll=>$ln){
			$ln_image = f_image::where('post_id', $ln->id)->first();
            $all_news[$ll]['ln_news']['img'] = Storage::url($ln_image->image_path.$ln_image->image_name);
			$all_news[$ll]['ln_news']['news']= news_table::find($ln->id);
            }
			return($all_news);
			}
    public function news_details($id){
$full_news_info = news_table::where('post_url_bng', $id)
->join('news_category_n_sub_categories', 'news_category_n_sub_categories.news_id', 'news_table.id')
->join('categories', 'categories.id', 'news_category_n_sub_categories.category_id')
->join('f_images', 'f_images.post_id', 'news_table.id')
->select('news_table.*', 'categories.*', 'news_category_n_sub_categories.news_id','news_category_n_sub_categories.category_id', 'f_images.image_path', 'f_images.image_name','f_images.image_caption', 'news_table.sub_title_bng', 'news_table.sub_title_bng_position')
->first();

$all_tages = tag::where('post_id', $full_news_info->news_id)->get();
$images = Storage::url($full_news_info->image_path.$full_news_info->image_name);
$img_caption = $full_news_info->image_caption;
$ads111 = Storage::url('app/public/img/bg-img/ad1.png');
$ads11 = Storage::url('app/public/img/bg-img/ad2.jpg');
$ip = \Request::ip();

$count_visit = visitor::where([['news_id', $full_news_info->news_id],['ip_address', $ip]])->select('visit_count')->first();
if(!empty($count_visit)){
    visitor::where([
        ['news_id', $full_news_info->news_id],
        ['ip_address', $ip]
    ])->update(['visit_count'=>$count_visit->visit_count+1]);
}else{
    visitor::create(['ip_address'=>$ip, 'news_id'=>$full_news_info->news_id, 'visit_count'=>'1']); 
}
return view('main_site.single-post', compact('full_news_info', 'all_tages', 'images', 'ads11', 'ads111', 'ip', 'img_caption'));
}
    public function news_categories($id){
    
    $full_news_info = postCategoryNSubcategory::where('category_id', $id)
    ->join('news_table', 'news_table.id', 'news_category_n_sub_categories.news_id')
    ->join('users', 'users.id', 'news_table.entry_by')
    ->join('f_images', 'f_images.post_id', 'news_table.id')
    ->groupBy('news_category_n_sub_categories.news_id')
    ->select('news_table.*', 'news_category_n_sub_categories.news_id', 'users.name as user_name', 'f_images.image_path', 'f_images.image_name')
    ->paginate(10);
    $category_info = category::find($id);
    $f_news = set_as_cat::join('news_table', 'news_table.id', 'news_id')
    ->join('f_images', 'f_images.post_id', 'news_table.id')
    ->where('category_id', $id)
    ->get();
    if($full_news_info){
        //$images = Storage::url($full_news_info->image_path.$full_news_info->image_name);
        
    $ads111 = Storage::url('app/public/img/bg-img/ad1.png');
    $ads11 = Storage::url('app/public/img/bg-img/ad2.jpg');
    return view('main_site.categories-post', compact('full_news_info', 'ads11', 'ads111', 'f_news', 'category_info'));
    }else{
    return "";
    }
    
    }
    public function t_n_c(request $request){
    $set_as  = set_as::whereIn('set_as', ['t_lead_news_1'])->orderBy('set_as', 'desc')->get();
    foreach($set_as as $key=>$t_n){
    $t_n_image = f_image::where('post_id', $t_n->news_id)->first();
    $all_news[$key]['img'] = Storage::url($t_n_image->image_path.$t_n_image->image_name);
    $all_news[$key]['news']= news_table::find($t_n->news_id);
    }

    return $all_news;
    }
    public function t_n_c2(request $request){
        $set_as3  = DB::table('news_table')
        ->select('news_table.id as news_id','news_table.post_title_bng', 'categories.category')
        ->join('news_category_n_sub_categories', 'news_category_n_sub_categories.news_id', 'news_table.id')
        ->join('categories', 'categories.id', 'news_category_n_sub_categories.category_id')
        ->where('categories.id', 2)
        ->groupby('news_table.id')
        ->orderby('news_table.id', 'desc')
        ->limit(2)
        ->get();
    foreach($set_as3 as $key=>$t_n2){
    $t_n_image = f_image::where('post_id', $t_n2->news_id)->first();
            $all_news[$key]['img'] = Storage::url($t_n_image->image_path.$t_n_image->image_name);
            $all_news[$key]['news']= news_table::find($t_n2->news_id);
    }
    
    return $all_news;
    }

    
public function m_n_t(request $request){
    $set_as2  = set_as::whereIn('set_as', ['m_lead_news_1'])->orderBy('set_as', 'desc')->get();
    foreach($set_as2 as $key=>$c_n){
    $c_n_image = f_image::where('post_id', $c_n->news_id)->first();
    $all_news[$key]['img'] = Storage::url($c_n_image->image_path.$c_n_image->image_name);
    $all_news[$key]['news']= news_table::find($c_n->news_id);
    }
 return $all_news;
    }

public function m_n_t2(request $request){
            $set_as4 = DB::table('news_table')
            ->select('news_table.id as news_id','news_table.post_title_bng', 'categories.category')
            ->join('news_category_n_sub_categories', 'news_category_n_sub_categories.news_id', 'news_table.id')
            ->join('categories', 'categories.id', 'news_category_n_sub_categories.category_id')
            ->where('categories.id', 8)
            ->groupby('news_table.id')
            ->orderby('news_table.id', 'desc')
            ->limit(2)
            ->get();
            foreach($set_as4 as $key=>$c_n){
            $c_n_image = f_image::where('post_id', $c_n->news_id)->first();
            $all_news[$key]['img'] = Storage::url($c_n_image->image_path.$c_n_image->image_name);
            $all_news[$key]['news']= news_table::find($c_n->news_id);
            }
     return $all_news;
            }
public function cns(Request $request){
        $full_news_info = postCategoryNSubcategory::where('sub_category_id', $request->id2)
        ->join('news_table', 'news_table.id', 'news_category_n_sub_categories.news_id')
        ->join('users', 'users.id', 'news_table.entry_by')
        ->join('f_images', 'f_images.post_id', 'news_table.id')
        ->select('news_table.*', 'news_category_n_sub_categories.news_id', 'users.name as user_name', 'f_images.image_path', 'f_images.image_name')
        ->paginate(10);
        $sub_category_info = sub_category::find($request->id2);
        $f_news = set_as_sub_cat::join('news_table', 'news_table.id', 'news_id')
        ->join('f_images', 'f_images.post_id', 'news_table.id')
        ->where('sub_category_id', $request->id2)
        ->get();
        if($full_news_info){
        //$images = Storage::url($full_news_info->image_path.$full_news_info->image_name);
        $ads111 = Storage::url('app/public/img/bg-img/ad1.png');
        $ads11 = Storage::url('app/public/img/bg-img/ad2.jpg');
        return view('main_site.sub_categories-post', compact('full_news_info', 'ads11', 'ads111', 'f_news', 'sub_category_info'));
        }else{
        return "No Data Found";
        }    
    }
	public function get_picture(Request $request){
    $news['image'] = news_table::join('set_as', 'set_as.news_id', 'news_table.id')
    ->where([['set_as', 'image_gallery'],['post_type','2']])
    ->join('news_category_n_sub_categories', 'news_category_n_sub_categories.news_id', 'news_table.id')
    ->join('f_images', 'f_images.post_id', 'news_table.id')
    ->select('news_category_n_sub_categories.category_id', 'news_table.*', 'f_images.*')
    ->first();
    $news['set_as_image'] = Storage::url($news['image']->image_path.$news['image']->image_name);

     $news['video'] = news_table::join('set_as', 'set_as.news_id', 'news_table.id')
    ->join('f_images', 'f_images.post_id', 'news_table.id')
    ->where([['set_as', 'video_gallery'],['post_type','3']])
    ->select('news_table.*', 'f_images.*')
    ->first();
     $news['vdo_img'] = Storage::url($news['video']->image_path.$news['video']->image_name);
    return $news;
    }
    public function last_sec(Request $request){
    
    if($request['section']!=''){
         $set_as  = set_as::where('set_as','like','%'.$request['section'].'%')->orderBy('set_as', 'desc')->get();
         foreach($set_as as $key=>$sa){
            $cn_image = f_image::where('post_id', $sa->news_id)->first();
            $all_news[$key][$request['section']]['img'] = Storage::url($cn_image->image_path.$cn_image->image_name);
            $all_news[$key][$request['section']]['news']= news_table::find($sa->news_id);
            }
            return $all_news;
    }
  
    }

    public function last_sec_c(Request $request){
    
        if($request['section']=='international_c'){
            $set_as4 = DB::table('news_table')
            ->select('news_table.id as news_id','news_table.post_title_bng', 'categories.category')
            ->join('news_category_n_sub_categories', 'news_category_n_sub_categories.news_id', 'news_table.id')
            ->join('categories', 'categories.id', 'news_category_n_sub_categories.category_id')
            ->where('categories.id', 6)
            ->groupby('news_table.id')
            ->orderby('news_table.id', 'desc')
            ->limit(3)
            ->get();
             foreach($set_as4 as $key=>$sa){
                $cn_image = f_image::where('post_id', $sa->news_id)->first();
                $all_news[$key][$request['section']]['img'] = Storage::url($cn_image->image_path.$cn_image->image_name);
                $all_news[$key][$request['section']]['news']= news_table::find($sa->news_id);
                }
                return $all_news;
        }
      
        }

        public function last_sec_b(Request $request){
    
            if($request['section']=='f_n_m_b'){
                $set_as4 = DB::table('news_table')
                ->select('news_table.id as news_id','news_table.post_title_bng', 'categories.category')
                ->join('news_category_n_sub_categories', 'news_category_n_sub_categories.news_id', 'news_table.id')
                ->join('categories', 'categories.id', 'news_category_n_sub_categories.category_id')
                ->where('categories.id', 7)
                ->groupby('news_table.id')
                ->orderby('news_table.id', 'desc')
                ->limit(3)
                ->get();
                 foreach($set_as4 as $key=>$sa){
                    $cn_image = f_image::where('post_id', $sa->news_id)->first();
                    $all_news[$key][$request['section']]['img'] = Storage::url($cn_image->image_path.$cn_image->image_name);
                    $all_news[$key][$request['section']]['news']= news_table::find($sa->news_id);
                    }
                    return $all_news;
            }
          
            }
            public function last_sec_e(Request $request){
                $set_as4 = DB::table('news_table')
                ->select('news_table.id as news_id','news_table.post_title_bng', 'categories.category')
                ->join('news_category_n_sub_categories', 'news_category_n_sub_categories.news_id', 'news_table.id')
                ->join('categories', 'categories.id', 'news_category_n_sub_categories.category_id')
                ->where('categories.id', 9)
                ->groupby('news_table.id')
                ->orderby('news_table.id', 'desc')
                ->limit(3)
                ->get();
                 foreach($set_as4 as $key=>$sa){
                    $cn_image = f_image::where('post_id', $sa->news_id)->first();
                    $all_news[$key]['etc_e']['img'] = Storage::url($cn_image->image_path.$cn_image->image_name);
                    $all_news[$key]['etc_e']['news']= news_table::find($sa->news_id);
                    }
                    return $all_news;
                }
    
        public function last_one(Request $request){
          $set_as  = set_as::where('set_as','like','%ml%')->orderBy('set_as', 'desc')->get();
         foreach($set_as as $key=>$sa){
            $cn_image = f_image::where('post_id', $sa->news_id)->first();
            $all_news[$key]['ml']['img'] = Storage::url($cn_image->image_path.$cn_image->image_name);
            $all_news[$key]['ml']['news']= news_table::find($sa->news_id);
            }
            return $all_news;
        }

        public function last_one_s(Request $request){
	
   
            $set_as  = set_as::where('set_as','like','%hm%')->orderBy('set_as', 'desc')->get();
            foreach($set_as as $key=>$sa){
               $cn_image = f_image::where('post_id', $sa->news_id)->first();
               $all_news[$key]['hm']['img'] = Storage::url($cn_image->image_path.$cn_image->image_name);
               $all_news[$key]['hm']['news']= news_table::find($sa->news_id);
               }
               return $all_news;
           }
        public function search_result(Request $request){
        if($request['search']!=""){
            $tags = $request['search'];
        }else if($request['id']!="" || $request['id']>0 ){
            $tags = $request['id'];
        }else{
            $tags = "hospital";
        }
        $all_tags_news = tag::join('news_table', 'news_table.id', 'tags.post_id')
        ->join('f_images', 'f_images.post_id', 'news_table.id')
        ->where('tags', 'like', '%'.$tags.'%')
        ->get();
        return view('main_site.search_result', compact('all_tags_news'));
        }

}