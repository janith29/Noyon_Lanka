<!DOCTYPE html>
          <html>
                  <head>
                     
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
                
                div.print {
                  
                  margin: auto;
                  border: 3px solid #73AD21;
                  background-color:black;
                  box-sizing: border-box; 
                   border: solid 2px white;
                   display:block
                }
                </style>
                  </head>
                  <body>
                      <?php
                          
        use Illuminate\Support\Facades\DB;
        use Carbon\Carbon;
        $Issue=Carbon::now();
        Carbon::setToStringFormat('Y-m-d');

        $delivereds = DB::select("SELECT * FROM `delivered` WHERE DATE(issudate) = ' $Issue' AND `print`=false");
        $refkey=null;
        $articleNo=null;
        $color=null;
                 ?>
                 <?php if($delivereds==null): ?>
                    
                 <div class="alert alert-danger">
                        <strong>Not print yet!</strong> 
                      </div>
                 <?php endif; ?>
                  <?php $__currentLoopData = $delivereds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivered): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                  $refkey=$delivered->refkey;
                  $Did=$delivered->id;
                  $inveID=null;
                  $deliveredinves = DB::table('deliveredinve')->where('deliID', $Did)->get();
                   // DB::table('delivered')
                  //   ->where('id', $delivered->id)
                  //   ->update(['print' => true]);
                  ?>
                  <?php $__currentLoopData = $deliveredinves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveredinve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                       $inveID=$deliveredinve->inveID;
                       $invertys = DB::table('inverty')->where('id', $inveID)->get();
                  ?>
                     <?php $__currentLoopData = $invertys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inverty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="print col-sm-3" >
                        <p style="color:white;"> articleNo:- <?php echo e($inverty->articleNo); ?> -<?php echo e($inverty->color); ?></p>
                        <br><br><br><br>
                        <p style="color:white;"><?php echo e($refkey); ?></p> 
                       </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                  </body>
          </html>
          