<?php $__env->startSection('add_extra_css'); ?>
<style>
#pop_news
{
width:80%;
height:auto;
}
#medical_life
{
height:50%;
}
#caption_new_section
{
display: none;
}
#sastho_seba_section
{
    display: none;
    margin-top: -7%
}
#s_c_n
{
  margin-top: 2%;
}
 #s_c_n>.col-sm-6
 {
  margin-bottom: 4%;
}
#hide2{
  display: none;
  margin-top:-10%; 
}

#last_news_details{
    height: 526px;
    overflow:auto;
}
.div{
    display: none;
    height: 526px;
    overflow:auto;
}

#picture_gallery{

	display:none
  }
#last_sec{
  display: none;
}
#last_one{
  display: none;
}
#datepicker>.ui-widget.ui-widget-content{
width:100%	
  }
#popular_news, #last_news{
  
    border-radius: 0;
    padding: 3%;
    width: 44%;
    background-color: #EE002D;
  
}


@media  screen and (max-width: 480px) 
{
  #sastho_seba_section 
  {
    margin-top: -20%;
  }
  #s_c_n>.col-sm-6
  {
    margin-bottom: 4%;
  }
  #hide2
  {
    margin-top:-30%; 
  }
 #lurk
 {
margin-bottom: 5%;
 }
 #medicine_technology
{
  margin-top:6%;
  } 
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('news_head'); ?>
    <?php
    $main_settings = App\main_setting::first();
    echo $main_settings->header_for_seo;
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body_section'); ?>
<div class="hero-area">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-lg-12"> 
        <!-- Breaking News Widget -->
        <div class="breaking-news-area d-flex align-items-center">
          <div class="news-title">
            <p>ব্রেকিং নিউজ</p>
          </div>
          <div id="breakingNewsTicker" class="ticker">
            <ul>
              <?php
              $bn = App\news_table::join('set_as_breaking_news','set_as_breaking_news.news_id','news_table.id')
              ->where([['news_table.post_status', '=', 1],['news_table.post_type','1']])
              ->orderBy('news_table.id', 'desc')
              ->get();
           
              ?>
              <?php $__currentLoopData = $bn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nbn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a   href="./news_details/<?php echo e($nbn->post_url_bng); ?>"><?php echo e($nbn->post_title_bng); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- Hero Add -->
      
    </div>
  </div>
</div>
<!-- ##### Hero Area End ##### --> 

<!-- ##### Featured Post Area Start ##### -->
<div class="featured-post-area">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="row"> 
          
          <!-- Single Featured Post -->
          <div class="col-12 col-lg-6">
            <div class="single-blog-post featured-post">
              <div class="post-thumb"> <a   href="./news_details/<?php echo e($f_news->post_url_bng); ?>"><img src="<?php echo e($img1); ?>" alt=""></a> </div>
              <div class="post-data"><a   href="./news_details/<?php echo e($f_news->post_url_bng); ?>    " class="post-title">
                <h6><?php echo e($f_news->post_title_bng); ?></h6>
                </a> </div>
            </div>
          </div>
          <!-- Single Post -->
          <div class="col-12 col-lg-3">
            <div class="single-blog-post">
              <div class="post-thumb"> <a   href="#"><img src="<?php echo e($img2); ?>" alt=""></a> </div>
              <div class="post-data"> <a   href="./news_details/<?php echo e($c_news1->post_url_bng); ?>" class="post-title">
                <h6><?php echo e($c_news1->post_title_bng); ?></h6>
                </a>
                <div class="post-meta"> 
                  <p class="post-excerp"><?php echo e($truncated); ?></p>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Single Post -->
          <div class="col-12 col-lg-3">
            <div class="single-blog-post">
              <div class="post-thumb"> <a   href="./news_details/<?php echo e($c_news2->post_url_bng); ?>"><img src="<?php echo e($img3); ?>" alt=""></a> </div>
              <div class="post-data"> <a   href="./news_details/<?php echo e($c_news2->post_url_bng); ?>" class="post-title">
                <h6><?php echo e($c_news2->post_title_bng); ?></h6>
                </a>
                <div class="post-meta">
                  <p class="post-excerp"><?php echo e($truncated2); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Featured Post Area End ##### --> 
<!--hide--> 

<!-- ##### Footer Add Area Start ##### -->
<!--<div class="footer-add-area" id="hide">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="footer-add"> <?php
          $ads2 = Storage::url('app/public/img/bg-img/footer-add.gif')
          ?> <a   href="#"><img src="<?php echo e($ads2); ?>" alt="ad2"></a> </div>
      </div>
    </div>
  </div>
</div>-->
<!-- ##### Popular News Area Start ##### -->
<div class="container" id="caption_new_section">
  <div class="row" >
    <div class="col-12 col-md-7 col-lg-12">
      <div class="row" id="render_news"> </div>
    </div>
    
  </div>
</div>
<div class="popular-news-area section-padding-80-50" id="sastho_seba_section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="section-heading">
          <h6>স্বাস্থ্য সেবা</h6>
        </div>
        <div class="row" >
          <div id="sastho_seba_main_news" class="row"></div>
          <div class="col-sm-12">
            <div class="row" id="s_c_n"></div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="section-heading">
          
          <button type="button" class="btn btn-danger" id="last_news">সর্বশেষ সংবাদ</button>
          <button type="button" class="btn btn-danger pull-right" id="popular_news">সর্বাধিক পঠিত</button>
        </div>
        <div id="last_news_details"></div>
        <div class="div"></div>

        

      </div>
    </div>
  </div>
  <!-- ##### Popular News Area End ##### -->
  <div class="container" style="margin-top: 2%">
    <div class="row">
      <div class="col-sm-12"> 
        <a href="./news_categories/13" >
        <h3 class="text-danger">বাংলাদেশের হাসপাতাল সমূহ... </h3>
        </a> <br>
      </div>
    </div>
  </div>
</div>

<div class="popular-news-area section-padding-80-50" id="hide2">
  <div class="container">
    <div class="row">
       
      <div class="col-sm-6" id="medical_learning"> 
        <div class="section-heading">
            <h6 >চিকিৎসা শিক্ষা</h6>
          </div>
          <span id="tln">
           
          </span>
          
      <!-- Single Featured Post -->
      <span id="tcn"></span>
      
      
      
    </div>
    
    <div class="col-sm-6" id="medicine_technology"> 
        <div class="section-heading">
            <h6>ওষুধ প্রযুক্তি</h6>
          </div>
       <span id="mln"></span>
      <!-- Single Featured Post -->
      <span id="mcn"></span>
      
   
    </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="col-sm-12">
    <div class="row"> 
      <a href="./news_categories/5"><h3 class="text-danger">বাংলাদেশের মেডিকেল শিক্ষা প্রতিষ্ঠান সমূহ...</h3></a></div>
  </div>
</div>
<br>
<!--<div class="footer-add-area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="footer-add"> <a   href="#"><img src="img/bg-img/footer-add.gif" alt=""></a> </div>
      </div>
    </div>
  </div>
</div> -->

<!-- ##### Video Post Area Start ##### -->
<div class="video-post-area bg-img bg-overlay" id="picture_gallery" style="background-image: url(img/bg-img/bg1.jpg);">
  <div class="container">
    <div class="row justify-content-center"> 
      
      <!-- Single Video Post -->
      <div class="col-12 col-sm-6 col-md-6">
        <div class="section-heading" >
          <h6 >ছবি ঘর</h6>
        </div>
        <div class="single-image-post" id="image_here"></div>
      </div>
      <div class="col-12 col-sm-6 col-md-6">
        <div class="section-heading">
          <h6 >ভিডিও চিত্র</h6>
        </div>
        <div class="single-video-post"> <div id="video_image_here"></div>
          <!-- Video Button -->
          <div class="videobtn" > <a id="video_here"   href="" class="videoPlayer"><i class="fa fa-play" aria-hidden="true"></i></a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Video Post Area End ##### -->
<div class="popular-news-area section-padding-80-50" id="last_sec">
  <div class="container">
    <div class="row">
      <!-- Single Post -->
      <div id="lurk" class="col-12 col-md-4">
        <div class="section-heading">
          <h6>আন্তর্জাতিক</h6>
        </div>
        <span id="international">
         

        </span>
        
        <span id="international_c"></span>
       
      </div>
      
      <!-- Single Post -->
      <div id="lurk" class="col-12 col-md-4">
        <div class="section-heading">
          <h6>খাদ্য ও পুষ্টি</h6>
        </div>
       <span id="f_n_m"></span>
       <span id="f_n_m_b"></span>
      </div>
      
      <!-- Single Post -->
      <div id="lurk" class="col-12 col-md-4">
        <div class="section-heading">
          <h6>বিবিধ</h6>
        </div>
       <span id="etc"></span>
       <span id="etc_e"></span>
      </div>
    </div>
  </div>
</div>

<!-- ##### Footer Add Area Start ##### -->

<!-- ##### Editorial Post Area Start ##### -->
<div class="popular-news-area section-padding-80-50" id="last_one">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="section-heading">
          <h6>মেডিকেল লাইফ</h6>
        </div>
        <div class="row" id="ml_news_1"> 
         
        </div>
      </div>
      <div class="col-sm-4">
          <div class="section-heading">
              <h6>স্বাস্থ্য মন্ত্রণালয়</h6>
            </div>
            <div class="row" id="ml_news_2"> 
         
              </div>
      </div>
    </div>
  </div>
</div>

<!-- ##### Editorial Post Area End ##### --> 

<!-- ##### Footer Add Area Start ##### -->


<!-- ##### Footer Add Area End ##### --> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('add_js'); ?>
<script>
  $(document).ready(function(){$.ajax({url:"./ajax/get_all_tags",method: "get",datatype: "json",success: function(data, msg){var data_arr = data.map(function(val){return val.tags;});$( "#search" ).autocomplete({source: data_arr});}})});
  $( function() {
  $( "#datepicker" ).datepicker();
  });
</script>
<script src='<?php echo e(asset('js/main_site/custom_js.js')); ?>'></script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main_site.includes.main_site', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>