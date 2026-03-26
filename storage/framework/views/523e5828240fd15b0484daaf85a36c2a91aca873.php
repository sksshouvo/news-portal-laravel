<?php
date_default_timezone_set("Asia/Bangkok");
use Rajurayhan\Bndatetime\BnDateTimeConverter; // on Top
$dateConverter  =  new  BnDateTimeConverter();
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
  
            <span class='fa fa-clock-o'></span> <?php echo e($dateConverter->getConvertedDateTime(date('Y-m-d'),  'BnBn', 'l jS F Y').", ".$dateConverter->getConvertedDateTime(date('Y-m-d'),  'BnEn', 'jS F Y ')); ?>

       
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
        <?php
        $url = Storage::url('app/public/logo.png');
        ?>
        <?php if($url!=""): ?>
        <a href="/"><img src="<?php echo e($url); ?>" alt=""  style="width:34%;height:auto;"></a>
        <?php endif; ?>
        </div>
        <div class="banner">
        <?php
        $banner = Storage::url('app/public/banner/ds_banner_1.png');
        ?>
        <?php if($banner!=""): ?>
        <img src="<?php echo e($banner); ?>" alt=""  style="width:61%;height:auto;margin-left:9%">
        <?php endif; ?> 
        </div>
  
                      <!-- Login Search Area -->
                      <div class="login-search-area d-flex align-items-center">
                          <!-- Login -->
                          <?php
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
                        ?>
                              <!-- Search Form -->
                              <div class="search-form">
                                      <form action="<?php echo e($link_new); ?>" method="GET">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('GET'); ?>
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
                            <a href="http://dainikshastha.com"><img src="<?php echo e($url); ?>" alt=""  style="width:62%;height:auto;margin-left:9%;"></a>
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
                                      <li <?php echo e((strpos(Request::url(), 'index'))?"class=active":""); ?> >
                                          <a href="<?=$_SERVER['PHP_SELF']?>">হোম</a>
                                        </li>
                                      
                                      <?php
                                      $all_category = App\category::where('status', '=', 1)->get();
                                      ?>
                                      <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php
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
                                      ?>
                                      <li onclick="r_link()"><a href="<?php echo e($link); ?>"><?php echo e($ac->category); ?></a>
                                         <?php
                                            $sub_cat = App\sub_category::where([
                                                ['category_id',$ac->id],
                                                ['status', '=', 1]
                                            ])->get();
                                            if (count($sub_cat)>0){
                                        ?>
                                        <div class="megamenu">
                                     
                                        <?php if($sub_cat!=""): ?>
                                        
                                        <?php $__currentLoopData = $sub_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
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
                                        ?>
                                        
                                        <ul class="single-mega cn-col-4">
                                                <li class="title"><a target="_blank" href="<?php echo e($link2); ?>"><?php echo e($sc->sub_category); ?></a></li>
                                                
                                            </ul>    
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <?php endif; ?>
                                            <?php
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
                                            ?>
                                        <!-- Single Featured Post -->
                                        <?php $__currentLoopData = $two_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
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
                                        ?>
                                        
                                        <div class="single-mega cn-col-4">
                                            <!-- Single Featured Post -->
                                            <div class="single-blog-post small-featured-post d-flex">
                                                <div class="post-thumb">
                                                    <a href="<?php echo e($link_th); ?>"><img src="<?php echo e($url2); ?>" alt=""></a>
                                                </div>
                                                <div class="post-data">
                                                    
                                                    <a href="<?php echo e($link_th); ?>" class="post-catagory"><?php echo e($tn->post_title_bng); ?></a>
                                                    <div class="post-meta">
                                                        <a href="<?php echo e($link_th); ?>" class="post-title">
                                                            <?php echo e(strip_tags(str_limit($tn->post_content_bng, 50,  '...'))); ?>

                                                        </a>
                                                        <br>
                                                        <p class="post-date"><span><?php echo e(date('h:i A', strtotime($tn->created_at))); ?></span> | <span><?php echo e(date('M - d', strtotime($tn->created_at))); ?></span></p>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                           
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                                        </div>
                                        <?php
                                        }
                                        ?>
                                      </li>  
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
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
    