
<?php $__env->startSection('custom_style'); ?>
    <style>
      .panel-title{
        padding-top: 1%;
        font-weight: 700;
      }
      .panel-title a{
  color: white;
  text-decoration: none;
  
}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('general_body'); ?>
    <div class="col-sm-12 ">
    <?php echo $__env->make('dashboard.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <?php echo $__env->make('dashboard.partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <h2>All News List</h2> 
    <div class="row">
    <div class="col-sm-12">
    <a href="./news" target="_blank" class="btn btn-primary btn-block" id="add_news" >Add New Post</a>
    </div>
    </div>
    <br>
    <div style="overflow: auto">
        <table class="table table-bordered table-hovered">
            <tr>
                <th>Post Title</th>
                <th>Created At</th>
                <th>Created By</th>
               
                <th>Status</th>
                <th>Edit</th>
            </tr>
        <?php $__empty_1 = true; $__currentLoopData = $news_move; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($item->post_title_bng); ?> (<?php echo e($item->post_title_eng); ?>)</td>
                <td><?php echo e($item->created_at); ?></td>
                <?php
                $user_name = App\news_table::find($item->id)->new_user;
                ?>
                <td><?php echo e($user_name->name); ?></td>
               
                <td>
                <?php if($item->post_status==0): ?>
                    <p class="text-danger">Draft</p>
                <?php else: ?>
                    <p class="text-success">Published</p>
                <?php endif; ?>
            </td>
            <td>
                <a href="./update_news/<?php echo e($item->id); ?>" target="_blank" title="Edit News" class="btn btn-primary"><span class="fa fa-edit"></span></a>
               </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="4"> <p class="text-danger text-center">No Data Found</p> </td>
        </tr>
        <?php endif; ?>
    
        </table>

    </div>

    <?php echo e($news_move->links()); ?>

    </div>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('add_js'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard/includes/main_app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>