<?php $__env->startSection('content'); ?>
    <!-- page content -->
    <?php
    
    use Illuminate\Support\Facades\DB;

    $counts = [
            'delivered' => \DB::table('delivered')->count(),
            'inverty' => \DB::table('inverty')->count(),
            'member' => \DB::table('member')->count(),
            
            'users_unconfirmed' => \DB::table('users')->where('confirmed', false)->count(),
            'users_inactive' => \DB::table('users')->where('active', false)->count(),
            'protected_pages' => 0
        ];
        ?>
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i>Total Mambers</span>
            <div class="count green"><?php echo e($counts['member']); ?></div>
        </div>
        
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fas fa-object-group"></i>Total Inverty</span>
            <div class="count green"><?php echo e($counts['inverty']); ?></div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fas fa-shopping-cart"></i>Total Delivered</span>
            <div>
                <span class="count green"><?php echo e($counts['delivered']); ?></span>
            </div>
        </div>
        
    </div>
    <!-- /top tiles -->

    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3> Noyon Lanka Inverty Management System
                        </h3>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row">
            <div class="container">
    
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                      </ol>
                  
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                        <div class="item active">
                          <img src="img/fabrics-details6.jpg" alt="Los Angeles" width="1800px" height="800px">
                        </div>
                  
                        <div class="item">
                          <img src="img/fabrics-details4.jpg" width="1800px" height="800px">
                        </div>
                      
                        <div class="item">
                          <img src="img/fabrics-details5.jpg" alt="New york" width="1800px" height="800px">
                        </div>
                      </div>
                  
                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  
    </div>
        

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <?php echo e(Html::script(mix('assets/admin/js/dashboard.js'))); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>