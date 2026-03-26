
<?php $__env->startSection('custom_style'); ?>
    <style>

      .toggle.btn{
        width: 21%

      }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('general_body'); ?>
    <div class="col-sm-12 ">
        <?php echo $__env->make('dashboard.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <?php echo $__env->make('dashboard.partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <h2>All Designation List</h2> <input type="button" value="Add New Designation" class="btn btn-primary btn-block" id="add_new_designation" data-toggle="modal" data-target="#create_designation_modal">
           <div class="active-overflow">
               <br>
            <table class="table table-responsive table-bordered">
                <tr>
                    <th class="text-center">Designation</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Action</th>
                </tr>
                <?php $__empty_1 = true; $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="text-center"><?php echo e($d->designation); ?></td>
                    <td class="text-center"><?php echo e($d->created_at->diffForHumans()); ?></td>
                    <td class="text-center"><button type="button" data-toggle="modal" data-target="#designationedit_<?php echo e($d->id); ?>" class="btn btn-sm btn-primary"><em class="fa fa-edit"></em></button></td>
                </tr>
               
                <!!--edit designation modal--!!>
                <div class="modal fade" id="designationedit_<?php echo e($d->id); ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <span class="modal-title">Edit Designation</span>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="designation/<?php echo e($d->id); ?>" method="POST" >
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                
                              
                              <label for="name">Designation: </label>
                              <input type="text" id="designation" name="designation" class="form-control" value="<?php echo e($d->designation); ?>" >
                             
                              
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" id="update_designation" >Update Designation</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>   
                      <!!--edit designation modal--!!>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="text-center">No Data Fiund</td>
                    </tr>

                      <?php endif; ?>
                
            </table>
            <?php echo e($designation->links()); ?>

           </div>
    </div>

          <!!--Create user modal--!!>
          <div class="modal fade" id="create_designation_modal" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <span class="modal-title">Create Designation</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="designation" method="POST" id="create_designation">
                          <?php echo csrf_field(); ?>
                          
                        
                        <label for="name">Designation: </label>
                        <input type="text" id="designation" name="designation" class="form-control" >
                       
                        
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="save_user" >Create Designation</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>   
                <!!--Designation Modal modal--!!>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard/includes/main_app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>