<?php $__env->startSection('title', "Delivery Management"); ?>

<?php $__env->startSection('content'); ?>
<script>
        $(document).ready(function(){
        
        var $checkboxes = $('#count-form input[type="checkbox"]');
            
        $checkboxes.change(function(){
            var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
            // $('#count-checked-checkboxes').text(countCheckedCheckboxes);
            
            var $selectcheck =  $('#count-checked-checkboxes').val(countCheckedCheckboxes);
            $("div#select h2").html("Some Text Here");
        });
        
        });
        </script>
    <link href="<?php echo e(asset('admin/css/userstyles.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            
                                 

                    
            </tr>
            </thead>
        </table>
        <?php if(Session::has('message')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <?php
    
        use Illuminate\Support\Facades\DB;
        $email=auth()->user()->email;
        ?>
               <div class="row">
                <?php if(Session::has('message')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                <form action="add" id="count-form" method="post" class="form-inline">
                        <div class="demptable">
                      
                                <div class="right-searchbar">
                                                <!-- Search form -->
                                                        <?php echo e(csrf_field()); ?>

                                                    <div class="form-group">
                                                            <input class="form-control"  id="count-checked-checkboxes" type="text" name="search"value="0" aria-label="Search" disabled required />
                                                        </div>
                                                    
                                            </div>
                                    </div>
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>articleNo</th>
                        <th>color</th>
                        <th>collection</th>
                        <th>location</th>
                        <th>Quantity</th>
                        <th>Select</th>
                    </tr>
                    </thead>
                    <tbody>
                            
                            <?php $__currentLoopData = $Invertys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Inverty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($Inverty->articleNo); ?></td>
                                <td><?php echo e($Inverty->color); ?></td>
                                <td><?php echo e($Inverty->collection); ?></td>
                                <td><?php echo e($Inverty->location); ?></td>
                                <td><?php echo e($Inverty->qty); ?></td>  
                                <td>
                                        <?php if(($Inverty->qty)<=0): ?>
                                        Quantity less than 0.
                                        <?php else: ?>
                                        
                               
                                    <input type="checkbox" name="Inventorycheckbox[]" value="<?php echo e($Inverty->id); ?>"></td>  
                                </form>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </tbody>
                </table>
                   <div class="demptable">
                <div class="form-group" align="right">
                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Add delivery</button>
                    </div>
                <div class="pull-right">
                </div>
            </div>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>