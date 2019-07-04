<?php $__env->startSection('title', "Delivery Management"); ?>

<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('admin/css/userstyles.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                

                    <div class="demptable">
                            <a href="<?php echo e(route('member.delivery.print')); ?>" class="btn btn-primary">Print Today Delivery</a>
                            <a href="<?php echo e(route('member.delivery.today')); ?>" class="btn btn-primary">Show Today Delivery</a>
                <div class="right-searchbar">
                                <!-- Search form -->
                                <form action="searchdelivery" method="post" class="form-inline">
                                        <?php echo e(csrf_field()); ?>

                                    <div class="form-group">
                                        <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search" required />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                                    </div>
                                    
                                </form>
                                <form action="Selectdate" method="post" class="form-inline">
                                        <?php echo e(csrf_field()); ?>

                                    <div class="form-group">
                                            <div class="form-group">
                                                    <input type="date" name="getdate" class="form-control" required/>
                                                </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Show Select date Delivery</button>
                                    </div>
                                    
                                </form>
                            </div>
                          
                    </div>

                    
            </tr>
            </thead>
        </table>
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <?php
    
        use Illuminate\Support\Facades\DB;
        ?>
               <div class="row">
                <?php if(Session::has('message')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Reference key</th>
                        <th>Request date</th>
                        <th>Issue date</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                            <?php $__currentLoopData = $Delivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Deliver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($Deliver->id); ?></td>
                                <td><?php echo e($Deliver->refkey); ?></td>
                                <td><?php echo e($Deliver->reqdate); ?></td>
                                <td><?php echo e($Deliver->issudate); ?></td>
                                <td> <a class="btn btn-xs btn-primary" href="<?php echo e(route('member.delivery.show',[$Deliver->id])); ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                               
                                
                            </td>  
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </tbody>
                </table>
                <div class="pull-right">
                    
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('member.layouts.member', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>