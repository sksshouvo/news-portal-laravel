 <?php if(session()->has('message')): ?>
<div class="col-sm-12">
  <div class="row">
    <div class="alert alert-success"> <?php echo e(session()->get('message')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>

</div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
<div class="col-sm-12">
  <div class="row">
    <div class="alert alert-danger"> <?php echo e(session()->get('error')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>

</div>  
<?php endif; ?>


