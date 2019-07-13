<?php $__env->startSection('title',"Add a delivery"); ?> 

<?php $__env->startSection('content'); ?>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="<?php echo e(route('admin.delivery.adddeliverynew')); ?>" method="post" enctype="multipart/form-data">
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
        $count=count($request);
        ?>

        
<div class="form-group">
        <label for="articleNo">Article No *</label>
        <?php for($i = 0; $i < $count; $i++): ?>
            <?php
             $IDin=$request[$i];
             
             $invertys = DB::table('inverty')->where('id', $IDin)->get();
             foreach($invertys as $inverty)
                {
                    $articleNoDelvery=$inverty->articleNo;
                    $IDinve=$inverty->id;
                }
            ?>
                <h2><?php echo e($articleNoDelvery); ?></h2>
                <select class="form-control" style="width: 100px;" name="parity[]">
                    <option class="form-control"  disabled value="">Select</option>

        <?php for($x = 0; $x < $count; $x++): ?>
                    <option class="form-control"  value="<?php echo e($x+1); ?>"><?php echo e($x+1); ?></option>

        <?php endfor; ?>
                  </select>
                <input type="hidden" name="IDinve[]" id="IDinve" value="<?php echo e($IDinve); ?>" >
       
        <?php endfor; ?>
    </div>
        <?php if(Session::has('message')): ?>
            <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
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
                <div class="form-group">
                    <label for="request_date">Request date*</label>
                    <input type="date" name="request_date" class="form-control" required/>
                </div>
            </div>
        </div>
        <div class="form-group">
                <label for="referenceby">Request by*</label>
                <input type="text" name="referenceby" class="form-control" id="referenceby" value="<?php echo e(old('referenceby')); ?>" placeholder="Request by" required>
        </div>
        <div class="form-group">
            <label for="premark">Remark (optional)</label>
            <textarea class="form-control" name="Remark" id="premark" cols="20" rows="05" placeholder="Premark"><?php echo e(old('premark')); ?></textarea>
        </div>
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