<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="site_title">
                <span><?php echo e(config('app.name')); ?></span>
            </a>
        </div>

        <div class="clearfix"></div>
            <?php

            use Illuminate\Support\Facades\DB;
            
            $email=auth()->user()->email;
            // $PICS = DB::select("SELECT * FROM `member` WHERE email = ' $email'");
            $PICS = DB::table('member')->where('email', $email)->get();
            $mbr_pic=null;
            foreach($PICS as $PIC)
                  {
                      $mbr_pic=$PIC->mbr_pic;
                  }
            ?>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src='\image\member\pic\<?php echo e($mbr_pic); ?>' alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2><?php echo e(auth()->user()->name); ?></h2>

                <h3>Admin</h3>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                 
                
                
                <ul class="nav side-menu">
                    <li>
                        
                        <a href="<?php echo e(route('admin.dashboard')); ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Management</h3>

                
                <?php ($IN = ''); ?>
                <?php ($app = ''); ?>
                <?php ($stor = ''); ?> 
                <?php ($qf = ''); ?> 
                <?php ($emp = ''); ?> 
                <?php ($inver = ''); ?> 
                

                <?php if(!empty($Member)): ?>
                    <?php ($emp = $Member->id); ?>
                <?php endif; ?>
                <?php if(!empty($inverty)): ?>
                <?php ($inver = $inverty->id); ?>
                <?php endif; ?>
                <?php if(!empty($delivery)): ?>
                    <?php ($IN = $delivery->id); ?>
                <?php endif; ?>
                <?php if(!empty($Delivery)): ?>
                    <?php ($app = $Delivery->id); ?>
                <?php endif; ?>
                <?php if(!empty($stores)): ?>
                    <?php ($stor = $stores->id); ?>
                <?php endif; ?>
                <?php if(!empty($questionsforum)): ?>
                    <?php if(!empty($questionsforum->id)): ?>
                        <?php ($qf =  $questionsforum->id); ?>
                    <?php endif; ?>
                <?php endif; ?> 

                <ul class="nav side-menu">
                    <li class="<?php if(Request::is('admin/member') || Request::is('admin/searchMember') ||Request::is('admin/member/add') || Request::is('admin/member/'.$emp)|| Request::is('admin/member/edit/'.$emp)): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('admin.member')); ?>">
                            <i class="fas fa-id-badge" aria-hidden="true"></i>
                            <?php echo e("Member"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('admin/inverty/add') ||Request::is('admin/inverty')||Request::is('admin/searchInverty')||Request::is('admin/inverty')||Request::is('admin/inverty/edit/'.$inver)||Request::is('admin/inverty/'.$inver)): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('admin.inverty')); ?>">
                            <i class="fas fa-object-group" aria-hidden="true"></i>
                            <?php echo e("Inventory "); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('admin/delivery') || Request::is('admin/delivery/add')|| Request::is('admin/delivery/today')||Request::is('admin/Selectdate')|| Request::is('admin/delivery/add?')|| Request::is('admin/delivery/add/'.$IN)|| Request::is('admin/searchdelivery')|| Request::is('admin/delivery/'.$app)): ?> ) active <?php endif; ?>">
                        <a href="<?php echo e(route('admin.delivery')); ?>">
                            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                            <?php echo e("Delivery"); ?>

                        </a>
                    </li>
                    
                   
                </ul>
            </div>
            
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
