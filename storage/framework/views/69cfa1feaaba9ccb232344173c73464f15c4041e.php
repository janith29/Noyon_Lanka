<?php $__env->startSection('title',"Add Item"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addinventory" method="post" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>


        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if(Session::has('message')): ?>
            <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>

        <div class="form-group">
            <label for="articleNo">Article No *</label>
            <input type="text" class="form-control" name="articleNo" id="articleNo" placeholder="Article No" value="<?php echo e(old('articleNo')); ?>">
        </div>
        <div class="form-group">
            <label for="color">Color *</label>
            <input type="text" class="form-control" name="color" id="color" placeholder="Color" value="<?php echo e(old('color')); ?>">
        </div>
        <div class="form-group">
            <label for="collection">Collection *</label>
            <input type="text" class="form-control" name="collection" id="collection" placeholder="Collection" value="<?php echo e(old('collection')); ?>">
        </div>
        <div class="form-group">
            <label for="location">Location *</label>
            <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="<?php echo e(old('location')); ?>">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity *</label>
            <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo e(old('quantity')); ?>">
        </div>
       
        <a href="<?php echo e(route('admin.inventory')); ?>" class="btn btn-danger">Cancel</a>
        <a href="<?php echo e(route('admin.inventory.add')); ?>" class="btn btn-primary">Clear</a>
        <button type="submit" class="btn btn-primary">Add</button>
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