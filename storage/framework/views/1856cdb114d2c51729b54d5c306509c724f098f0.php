
<?php $__env->startSection('add_extra_css'); ?>
<meta property="og:title" content="<?php echo e($full_news_info->post_title_bng); ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://dainikshastha.com/news_deatils/<?php echo e($full_news_info->post_url_bng); ?>" />
<meta property="og:image" content="http://dainikshastha.com<?php echo e($images); ?>" />
<style>
    .breadcrumb {

        background-color: #EE002D;

    }

    a,
    a:hover,
    a:focus {

        color: white;
    }

    .breadcrumb-item.active {
        color: white;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('news_head'); ?>
<title><?php echo e($full_news_info->post_title_bng); ?> || দৈনিক স্বাস্থ্য</title>
<?php
foreach($all_tages as $at){
$alt[] =  $at->tags;
}
?>
<meta name="keywords" content="<?php echo e(implode(',',$alt)); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body_section'); ?>
<!-- ##### Hero Area Start ##### -->

<!-- ##### Hero Area End ##### -->
<br>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a
                    href="../news_categories/<?php echo e($full_news_info->category_id); ?>"><?php echo e($full_news_info->category); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($full_news_info->post_title_bng); ?></li>
        </ol>
    </nav>
</div>

<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">

                    <!-- Single Featured Post -->
                    <div class="single-blog-post featured-post single-post">

                        <div class="post-data">
                            <?php if($full_news_info->sub_title_bng_position=="top_of_title_bng"): ?>
                               <h4><?php echo e($full_news_info->sub_title_bng); ?></h4> 
                            <?php endif; ?>
                            <a href="#" class="post-title">
                                <h6><?php echo e($full_news_info->post_title_bng); ?></h6>
                            </a>
                            <?php if($full_news_info->sub_title_bng_position=="bottom_of_title_bng"): ?>
                            <h4><?php echo e($full_news_info->sub_title_bng); ?></h4> 
                         <?php endif; ?>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <h5><?php echo e($full_news_info->news_by); ?></h5>

                                        </div>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row" style="float:right">
                                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                            <div class="addthis_inline_share_toolbox"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="post-thumb">
                                <a href="#"><img src="<?php echo e($images); ?>" alt="" style="width: 100%"></a>
                                <p>Image Caption: <?php echo e($img_caption); ?></p>
                            </div>


                            <div class="post-meta">
                                <?php echo $full_news_info->post_content_bng; ?>

                                <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                    <!-- Tags -->
                                    <div class="newspaper-tags d-flex">
                                        <span>Tags:</span>
                                        <?php $__currentLoopData = $all_tages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $at): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <ul class="d-flex">
                                            <li><a target="_blank" href="../news_tags/<?php echo e($at->tags); ?>"><?php echo e($at->tags); ?></a></li>
                                        </ul>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    
</div>
</div>

<div class="col-12 col-lg-4">
    <div class="blog-sidebar-area">
        
        <br>
        <br>
        <div class="section-heading">
            <h6>সর্বাধিক পঠিত</h6>

        </div>
        <!-- Latest Posts Widget -->
        <div class="latest-posts-widget mb-50" style="overflow:auto;height:400px">
            <div class="div"></div>
        </div>
</div>
</div>
</div>
</div>
</div>
<!-- ##### Blog Area Start ##### -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('add_js'); ?>

<script>
    $(document).ready(function () {
        $.ajax({
            url: "../ajax/popular_news",
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
                        text2 += '<a target="_blank"  href="./' + data3[key].pn_news.news.post_url_bng + '"><img src="' + data3[key].pn_news.img + '" alt="popular_news_' + key + '"></a>';
                        text2 += '</div>';
                        text2 += '<div class="post-data">';
                        text2 += '<a target="_blank"  href="./' + data3[key].pn_news.news.post_url_bng + '" class="post-title"><h6>' + data3[key].pn_news.news.post_title_bng + '</h6></a>';
                        text2 += '</div>';
                        text2 += '</div>';
                    });
                    $(".div").html(text2);

                }
            }
        });
    });
    $(document).ready(function(){$.ajax({url:"../ajax/get_all_tags",method: "get",datatype: "json",success: function(data, msg){var data_arr = data.map(function(val){return val.tags;});$( "#search" ).autocomplete({source: data_arr});}})});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main_site.includes.main_site', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>