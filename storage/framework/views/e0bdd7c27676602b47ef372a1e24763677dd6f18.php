<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo e(route('member.dashboard')); ?>" class="site_title">
                
                    <span><?php echo e(config('app.name')); ?></span>
            </a>
        </div>

        <div class="clearfix"></div>
        <?php
    
        use Illuminate\Support\Facades\DB;
        $email=auth()->user()->email;
        $members = DB::table('member')->where('email', $email)->get();
        $mbr_pic = "pandding";
        $id=null;
            foreach($members as $member)
            {
                $mbr_pic=$member->mbr_pic;
                $id=$member->id;
            }
        ?>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img  src="\image\member\pic\<?php echo e($mbr_pic); ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2><?php echo e(auth()->user()->name); ?></h2>
                <h3>Other</h3>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li>
                        <a href="<?php echo e(route('member.dashboard')); ?>">
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
                    <li class="<?php if(Request::is('member/member') || Request::is('member/member/edit/'.$id) || Request::is('member/member/edit/editmember')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('member.member')); ?>">
                            <i class="fas fa-id-badge" aria-hidden="true"></i>
                            <?php echo e("Member"); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('member/inverty/add') ||Request::is('member/inverty')||Request::is('member/searchInverty')||Request::is('member/inverty')||Request::is('admin/inverty/edit/'.$inver)||Request::is('member/inverty/'.$inver)): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('member.inverty')); ?>">
                            <i class="fas fa-object-group" aria-hidden="true"></i>
                            <?php echo e("Inverty "); ?>

                        </a>
                    </li>
                    <li class="<?php if(Request::is('member/delivery') || Request::is('member/delivery/add')|| Request::is('member/delivery/add?')|| Request::is('member/delivery/add/'.$IN)|| Request::is('member/searchdelivery')|| Request::is('member/delivery/today')|| Request::is('member/delivery/'.$app)): ?> ) active <?php endif; ?>">
                        <a href="<?php echo e(route('member.delivery')); ?>">
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
