<?php
date_default_timezone_set("Asia/Bangkok");
use Rajurayhan\Bndatetime\BnDateTimeConverter; // on Top
$dateConverter  =  new  BnDateTimeConverter();
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
  
            <span class='fa fa-clock-o'></span> {{$dateConverter->getConvertedDateTime(date('Y-m-d'),  'BnBn', 'l jS F Y').", ".$dateConverter->getConvertedDateTime(date('Y-m-d'),  'BnEn', 'jS F Y ')}}
       
        </div>
    </div>
</div>
<header class="header-area" ><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Top Header Area -->
  <div class="top-header-area" >
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="top-header-content d-flex align-items-center justify-content-between">
                      <!-- Logo -->
                      <div class="logo">
        @php
        $url = Storage::url('app/public/logo.png');
        @endphp
        @if ($url!="")
        <a href="/"><img src="{{$url}}" alt=""  style="width:34%;height:auto;"></a>
        @endif
        </div>
        <div class="banner">
        @php
        $banner = Storage::url('app/public/banner/ds_banner_1.png');
        @endphp
        @if ($banner!="")
        <img src="{{$banner}}" alt=""  style="width:61%;height:auto;margin-left:9%">
        @endif 
        </div>
  
                      <!-- Login Search Area -->
                      <div class="login-search-area d-flex align-items-center">
                          <!-- Login -->
                          @php
                          if(strpos(Request::url(), 'news_categories')){
                          $link_new = '../search_result/';
                          }else if(strpos(Request::url(), 'news_sub_categories')){
                          $link_new = '../search_result/';
                          }else if(strpos(Request::url(), 'news_details')){
                          $link_new = '../search_result/';
                          }else if(strpos(Request::url(), 'search_result')){
                          $link_new = './search_result/';
                          }else{
                          $link_new = './search_result/';
                          }
                        @endphp
                              <!-- Search Form -->
                              <div class="search-form">
                                      <form action="{{$link_new}}" method="GET">
                                        @csrf
                                        @method('GET')
                                          <input type="search" name="search" id="search" class="form-control" value="<?=(isset($_GET['search'])?$_GET['search']:'')?>" placeholder="Search">
                                          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
  
          <!-- Navbar Area -->
          <div class="newspaper-main-menu" id="stickyMenu">
              <div class="classy-nav-container breakpoint-off">
                  <div class="container">
                      <!-- Menu -->
                      <nav class="classy-navbar justify-content-between" id="newspaperNav">
  
                          <!-- Logo -->
                          <div class="logo">
                            <a href="http://dainikshastha.com"><img src="{{$url}}" alt=""  style="width:62%;height:auto;margin-left:9%;"></a>
                          </div>
  
                          <!-- Navbar Toggler -->
                          <div class="classy-navbar-toggler">
                              <span class="navbarToggler"><span></span><span></span><span></span></span>
                          </div>
  
                          <!-- Menu -->
                          <div class="classy-menu">
  
                              <!-- close btn -->
                              <div class="classycloseIcon">
                                  <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                              </div>
  
                              <!-- Nav Start -->
                              <div class="classynav">
                                  <ul>
                                      <li {{{(strpos(Request::url(), 'index'))?"class=active":""}}} >
                                          <a href="<?=$_SERVER['PHP_SELF']?>">হোম</a>
                                        </li>
                                      
                                      @php
                                      $all_category = App\category::where('status', '=', 1)->get();
                                      @endphp
                                      @foreach ($all_category as $ac)
                                      @php
                                        if(strpos(Request::url(), 'news_categories')){
                                        $link = '../news_categories/'.$ac->id.'';
                                        }else if(strpos(Request::url(), 'news_sub_categories')){
                                        $link = '../news_categories/'.$ac->id.'';
                                        }else if(strpos(Request::url(), 'news_details')){
                                        $link = '../news_categories/'.$ac->id.'';
                                        }else if(strpos(Request::url(), 'search_result')){
                                            $link = './news_categories/'.$ac->id.'';
                                            }else{
                                        $link = './news_categories/'.$ac->id.'';
                                          }
                                      @endphp
                                      <li onclick="r_link()"><a href="{{$link}}">{{$ac->category}}</a>
                                         @php
                                            $sub_cat = App\sub_category::where([
                                                ['category_id',$ac->id],
                                                ['status', '=', 1]
                                            ])->get();
                                            if (count($sub_cat)>0){
                                        @endphp
                                        <div class="megamenu">
                                     
                                        @if ($sub_cat!="")
                                        
                                        @foreach ($sub_cat as $sc)
                                        @php
                                        if(strpos(Request::url(), 'news_sub_categories')){
                                        $link2 = '../news_sub_categories/'.$sc->id.'';
                                        }else if(strpos(Request::url(), 'news_categories')){
                                        $link2 = '../news_sub_categories/'.$sc->id.'';
                                        }else if(strpos(Request::url(), 'news_details')){
                                        $link2 = '../news_sub_categories/'.$sc->id.'';
                                        }else if(strpos(Request::url(), 'search_result')){
                                        $link2 = './news_sub_categories/'.$sc->id.'';
                                        }else{
                                        $link2 = './news_sub_categories/'.$sc->id.'';
                                        }
                                        @endphp
                                        
                                        <ul class="single-mega cn-col-4">
                                                <li class="title"><a target="_blank" href="{{$link2}}">{{$sc->sub_category}}</a></li>
                                                
                                            </ul>    
                                        @endforeach
                                        
                                        @endif
                                            @php
                                                $two_news = DB::table('news_table')
                                                ->select('news_table.*')
                                                ->join('news_category_n_sub_categories', 'news_category_n_sub_categories.news_id', 'news_table.id')
                                                ->where([
                                                    ['news_category_n_sub_categories.category_id','=',$ac->id],
                                                    ['news_table.post_status', '=', '1']
                                                ])
                                                ->limit(2)
                                                ->orderBy('news_table.id', 'desc')
                                                ->get();
                                            @endphp
                                        <!-- Single Featured Post -->
                                        @foreach ($two_news as $tn)
                                        @php
                                        if(strpos(Request::url(), 'news_categories')){
                                            $link_th = '../news_details/'.$tn->post_url_bng.'';
                                            }else if(strpos(Request::url(), 'news_sub_categories')){
                                                $link_th = '../news_details/'.$tn->post_url_bng.'';
                                            }else if(strpos(Request::url(), 'news_details')){
                                                $link_th = '../news_details/'.$tn->post_url_bng.'';
                                            }else if(strpos(Request::url(), 'search_result')){
                                                $link_th = './news_details/'.$tn->post_url_bng.'';
                                                }else{
                                                    $link_th = './news_details/'.$tn->post_url_bng.'';
                                              }

                                        $f_image = App\f_image::where('post_id', $tn->id)->first();
                                        $url2 = Storage::url($f_image->image_path.$f_image->image_name);
                                        @endphp
                                        
                                        <div class="single-mega cn-col-4">
                                            <!-- Single Featured Post -->
                                            <div class="single-blog-post small-featured-post d-flex">
                                                <div class="post-thumb">
                                                    <a href="{{$link_th}}"><img src="{{$url2}}" alt=""></a>
                                                </div>
                                                <div class="post-data">
                                                    
                                                    <a href="{{$link_th}}" class="post-catagory">{{$tn->post_title_bng}}</a>
                                                    <div class="post-meta">
                                                        <a href="{{$link_th}}" class="post-title">
                                                            {{strip_tags(str_limit($tn->post_content_bng, 50,  '...'))}}
                                                        </a>
                                                        <br>
                                                        <p class="post-date"><span>{{date('h:i A', strtotime($tn->created_at))}}</span> | <span>{{date('M - d', strtotime($tn->created_at))}}</span></p>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                           
                                        </div>
                                        @endforeach
                                           
                                        </div>
                                        @php
                                        }
                                        @endphp
                                      </li>  
                                      @endforeach
                                     
                                      <li><a class="btn btn-danger" href="/public/news_admin/login"l id="login_button" style="height:39px;">Login</a></li> 
                                  </ul>
                              </div>
                              <!-- Nav End -->
                          </div>
                      </nav>
                  </div>
              </div>
          </div>
      </header>
    