<?php $__env->startSection('body_class','login'); ?>

<?php $__env->startSection('content'); ?>
    
<div class="flex-center position-ref ">
    <div class="top-left brand">
        <img src="img/art.png" alt="">
        <h1> Forgot password</h1>
    </div>
</div>
                <div class="container">
                            
                  <?php if(!empty($message)): ?>
                  <div class="panel panel-danger">
          
                          
                          <div class="panel-heading"> <div class="col-12 col-lg-5"><?php echo e($message); ?></div>
                          <div  align="right"> .</a></div>
                      </div>
                      </div>
                      <?php endif; ?>
              <div class="row ">
                      
                      <div class="col-xs-12 col-sm-12 col-lg-4  ">
                              <div class="panel panel-warning">
                              </div></div>  
                  <div class="col-xs-12 col-sm-12 col-lg-8">
                          <div class="panel panel-primary">
                                  <div class="panel-heading ">
                  <h2>Reset password form</h2>
                  <?php echo e(Form::open(['route' => 'resetpass'])); ?>

                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                      placeholder="<?php echo e(__('views.auth.login.input_0')); ?>" required autofocus>
                  </div>
                    
                    <?php if(session('status')): ?>
              <div class="alert alert-success">
                  <?php echo e(session('status')); ?>

              </div>

          <?php endif; ?>

          <?php if(!$errors->isEmpty()): ?>
              <div class="alert alert-danger" role="alert">
                  <?php echo $errors->first(); ?>

              </div>
          <?php endif; ?>
          <button class="btn btn-default submit" type="submit">check email</button>
         
          <?php echo e(Form::close()); ?>

                </div></div>
                      </div>
              </div></div>
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
<?php echo $__env->make('auth.layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>