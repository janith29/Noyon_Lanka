<!DOCTYPE html>
          <html>
                  <head>
                     
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
           
           
            table.first {
                color: #fcfcfc;
                font-family: helvetica;
                font-size: 6pt;
            }
            td {
                background-color: #000000;
            }
            
            .lowercase {
                text-transform: lowercase;
            }
            .uppercase {
                text-transform: uppercase;
            }
            .capitalize {
                text-transform: capitalize;
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
                  $deliveredinves =   DB::table('deliveredinve')->where('deliID', $Did)->orderBy('accd', 'ASC')->get();
                //    DB::table('delivered')
                //     ->where('id', $delivered->id)
                //     ->update(['print' => true]);
                  ?>
                  
                 
                     
                     <table class="first" >
                        <tr>
                                <td width="90" height="115"><b>
                            <?php $__currentLoopData = $deliveredinves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveredinve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php

                                $inveID=$deliveredinve->inveID;
                                $invertys = DB::table('inverty')->where('id', $inveID)->get();
                            foreach($invertys as $inverty)
                            {
                                $articleNo=$inverty->articleNo;
                                $color=$inverty->color;
                              }
                            ?>
                                <h3>articleNo:-<?php echo e($articleNo); ?> </h3>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </b></td>
                        <td width="80" ><b>
                            <?php $__currentLoopData = $deliveredinves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveredinve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php

                                $inveID=$deliveredinve->inveID;
                                $invertys = DB::table('inverty')->where('id', $inveID)->get();
                            foreach($invertys as $inverty)
                            {
                                $articleNo=$inverty->articleNo;
                                $color=$inverty->color;
                              }
                            ?>
                                <h3>-<?php echo e($color); ?></h3>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </b></td>
                        </tr>
                        <tr>
                           <td width="170" ><b><h3><?php echo e($refkey); ?></h3></b></td>
                          </tr>
                       </table>
                       <br>
                         <br>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                  </body>
          </html>
          