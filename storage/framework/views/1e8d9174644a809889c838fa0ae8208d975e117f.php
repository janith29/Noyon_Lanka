<?php $__env->startSection('title',"Inventory Management"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updateinverty" method="post" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <?php if(!$errors->isEmpty()): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errors->first(); ?>

        </div>
    <?php endif; ?>
    
    <?php if(Session::has('message')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
        <div class="form-group">
        <h3>Article No: <?php echo e($inverty->articleNo); ?></h3>
        </div>
        <div class="form-group">
            <label for="color">Color *</label>
            <input type="text" class="form-control" name="color" id="color" value="<?php echo e($inverty->color); ?>">
        </div>
        <div class="form-group">
            <label for="collection">Collection *</label>
            <input type="text" class="form-control" name="collection" id="collection"  value="<?php echo e($inverty->collection); ?>">
        </div>
        <div class="form-group">
            <label for="location">Location *</label>
            <input type="text" class="form-control" name="location" id="location" value="<?php echo e($inverty->location); ?>">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity *</label>
            <input type="text" class="form-control" name="quantity" id="quantity" value="<?php echo e($inverty->qty); ?>">
        </div>
        <input type="hidden" id="id" name="id" value="<?php echo e($inverty->id); ?>">
        <a href="<?php echo e(route('admin.inverty')); ?>" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/users/edit.css'))); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <?php echo e(Html::script(mix('assets/admin/js/users/edit.js'))); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>