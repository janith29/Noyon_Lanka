<?php $__env->startSection('title',"Add a delivery"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="adddelivery" method="post" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>

        <?php
        use Illuminate\Support\Facades\DB;
        use Carbon\Carbon;
        $deliveres = DB::select('select * from delivered ORDER BY id DESC LIMIT 1');
        
        $lastid=null;
        foreach($deliveres as $deliveree)
        {
            $lastid=$deliveree->id;
        }

        
        $lastid=$lastid+1;
        $mytime =  Carbon::now();
        Carbon::setToStringFormat('Ymd');
        if($lastid<10)
        {
        $refkey=$mytime."0".$lastid;
        }
        else {
            $refkey=$mytime.$lastid;
        }
        $Issue=Carbon::now();
        Carbon::setToStringFormat('Y-m-d');
        ?>
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php
            $articleNoDelvery=$delivery->articleNo ;
        ?>
        <?php if(Session::has('message')): ?>
            <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <div class="form-group">
            <label for="articleNo">Article No *</label>
            <h2><?php echo e($articleNoDelvery); ?></h2>
        </div>
        <div class="form-group">
            <label for="articleNo">Reference No *</label>
            <h2><?php echo e($refkey); ?></h2>
        </div>
        <div class="form-group">
            <label for="articleNo">Issue date *</label>
            <h2><?php echo e($Issue); ?></h2>
        </div>
        <div class="container">
            <div class="form-group">
                <?php echo Form::label('request_date', 'Request date'); ?>

                <?php echo Form::date('request_date', null, ['class'=> 'form-control']); ?>

            </div>
        </div>
        
        <div class="form-group">
            <label for="quantity">Quantity *</label>
            <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo e(old('quantity')); ?>"  <?php if( $articleNoDelvery==null): ?>disabled <?php endif; ?>>
        </div>
       
        <input type="hidden" name="articleNo" id="articleNo" value="<?php echo e($delivery->articleNo); ?>" >
        <input type="hidden" name="issue_date" id="issue_date" value="<?php echo e($Issue); ?>" >
        <input type="hidden" name="refkey" id="refkey" value="<?php echo e($refkey); ?>" >
        <a href="<?php echo e(route('admin.delivery')); ?>" class="btn btn-danger">Cancel</a>
        <?php if( $articleNoDelvery!=null): ?> 
        <button type="submit" class="btn btn-primary">Add</button>
        <?php endif; ?>
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