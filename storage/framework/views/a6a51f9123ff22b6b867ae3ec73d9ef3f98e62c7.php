<?php $__env->startSection('title', "Delivery Management"); ?>

<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('admin/css/userstyles.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                

                    <div class="demptable">
                       
                <div class="right-searchbar">
                                <!-- Search form -->
                               
                            </div>
                            <a href="<?php echo e(route('member.delivery.print')); ?>" class="btn btn-primary">Print Today Delivery</a>
                           
                            <a href="<?php echo e(route('member.delivery.today')); ?>" class="btn btn-primary">Show Today Delivery</a>
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
                        <th>articleNo</th>
                        <th>Reference key</th>
                        <th>Request date</th>
                        <th>Issue date</th>
                        <th>Quantity</th>
                        <th>Print</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                            <?php $__currentLoopData = $Delivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Deliver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($Deliver->articleNo); ?></td>
                                <td><?php echo e($Deliver->refkey); ?></td>
                                <td><?php echo e($Deliver->reqdate); ?></td>
                                <td><?php echo e($Deliver->issudate); ?></td>
                                <td><?php echo e($Deliver->qty); ?></td>  
                                <td>
                                    <?php if($Deliver->print ==true): ?>
                                    Print
                                    <?php else: ?> Not Print
                                    <?php endif; ?>
                                </td>  
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