<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active"><?php
	
                    $route_name = explode('.',Route::currentRouteName());
            
                    ?>
                <?php echo e(ucfirst(str_replace('_', ' ', $route_name[0]))); ?></li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $__env->yieldContent('page_name'); ?></h1>
        </div>
    </div><!--/.row-->
    <?php $__env->startSection('dashboard_header'); ?>
                
    <?php echo $__env->yieldSection(); ?>
    
    <div class="row">
        <div class="col-md-12">
           <?php $__env->startSection('traffic_section'); ?>
               
           <?php echo $__env->yieldSection(); ?>
        </div>
    </div><!--/.row-->
    <div class="row">
      <?php $__env->startSection('pie_chart'); ?>
          
      <?php echo $__env->yieldSection(); ?>
    </div><!--/.row-->
      
    <div class="row">
        <?php $__env->startSection('general_body'); ?>
            
        <?php echo $__env->yieldSection(); ?>
    </div>
    <div class="row">
        <?php $__env->startSection('others_section'); ?>
            
        <?php echo $__env->yieldSection(); ?>
        <div class="col-sm-12">
            <p class="back-link">Powered By Sksshouvo.inc</p>
        </div>
    </div><!--/.row-->
  
</div>	<!--/.main-->
