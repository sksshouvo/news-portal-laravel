
<?php $__env->startSection('add_extra_css'); ?>
<style>
        #pop_news{
        width:80%;
        height:auto;
        }
        #medical_life{
        height:50%;
        }
        #caption_new_section{
        display: none;
        }
        #sastho_seba_section{
            display: none;
        }
        .div{
            height: 526px;
            overflow:auto;
        }
        #last_news_details{
            display: none;
            height: 526px;
            overflow:auto;
        }
        #hide2{
          display: none;
        }
        </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body_section'); ?>

<br>
    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                     <!-- Single Post -->
                     <?php $__empty_1 = true; $__currentLoopData = $all_tags_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $fn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                     <?php
                     $f_img = Storage::url($fn->image_path.$fn->image_name);
                     ?>
                     <div class="col-12 col-sm-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <?php
                                    if(strpos(Request::url(), 'news_tags')){
                                        $linkss = '../news_details/'.$fn->post_url_bng;
                                    }else{
                                        $linkss = './news_details/'.$fn->post_url_bng;
                                    }  
                                    ?>
                                    
                                <a target="_blank" href="<?php echo e($linkss); ?>"><img src="<?php echo e($f_img); ?>" alt="lead_image_<?php echo e($key); ?>"></a>
                                </div>
                                <div class="post-data">

                                    <a target="_blank" href="<?php echo e($linkss); ?>" class="post-title">
                                    <h6><?php echo e($fn->post_title_bng); ?></h6>
                                    </a>
                                   
                                </div>
                            </div>
                        </div> 
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                     <div class="col-12 col-sm-6"><div class="row"><h2>No News is been selected for category lead news</h2></div></div>
                     <?php endif; ?>
                    </div>
                </div>

               <div class="col-12 col-md-5 col-lg-4">
                    <!-- Single Post -->
                    
                    
                   
                    <div class="section-heading">
                        <h6>সর্বাধিক পঠিত</h6>
                       
                    </div>
                    <xdiv class="div" style="overflow:auto;height:780px">
                    
                    </div> 
                
               
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('add_js'); ?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5444207a5007ac5e"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            url: "./ajax/popular_news",
            method: "get",
            dataType: "json",
            data: {
                section: "popular_news",
                limit: 100
            },
            success: function (data3) {
                if (data3 != "") {
                    var text2 = "";
                    $.each(data3, function (key, val) {
                        text2 += '<div class="single-blog-post small-featured-post d-flex">';
                        text2 += '<div class="post-thumb">';
                        text2 += '<a target="_blank"  href="./news_details/' + data3[key].pn_news.news.post_url_bng + '"><img src="' + data3[key].pn_news.img + '" alt="popular_news_' + key + '"></a>';
                        text2 += '</div>';
                        text2 += '<div class="post-data">';
                        text2 += '<a target="_blank"  href="./news_details/' + data3[key].pn_news.news.post_url_bng + '" class="post-title"><h6>' + data3[key].pn_news.news.post_title_bng + '</h6></a>';
                        text2 += '</div>';
                        text2 += '</div>';
                    });
                    $(".div").html(text2);

                }
            }
        });
    });
    $(document).ready(function(){$.ajax({url:"./ajax/get_all_tags",method: "get",datatype: "json",success: function(data, msg){var data_arr = data.map(function(val){return val.tags;});$( "#search" ).autocomplete({source: data_arr});}})});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main_site.includes.main_site', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>