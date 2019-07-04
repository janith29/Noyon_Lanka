<?php $__env->startSection('title', "Delivery Management"); ?>

<?php $__env->startSection('content'); ?>

<div class="row">

        <table class="table table-striped table-hover">
                <tbody>
                        <th>
                                <h2>Delivery Details</h2>
                                </th>
                            </tr>
                            <tr>
                                <th>Reference No</th>
                                <td>
                                        <?php echo e($Delivery->refkey); ?>

                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Issue date</th>
                                <td>
                                        <?php echo e($Delivery->issudate); ?>

                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Request date</th>
                                <td>
                                        <?php echo e($Delivery->reqdate); ?>

                                    </a>
                                </td>
                            </tr>
                
<?php
        use Illuminate\Support\Facades\DB;
        $invertydels = DB::table('deliveredinve')->where('deliID', $Delivery->id)->get();
           
           $ArticleNo="panding";
           $invertyCount=null;

        ?>
           <?php $__currentLoopData = $invertydels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invertydel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
              
        $invertys = DB::table('inverty')->where('id', $invertydel->inveID)->get();
        foreach ($invertys as $inverty) {
            $ArticleNo=$inverty->articleNo;
            $invertyCount=$inverty->qty;
            $color=$inverty->color;
            $collection=$inverty->collection;
            $location=$inverty->location;
        }
          ?>
                <tr>
                    <th>
                    <h2>Inventory Details</h2>
                    </th>
                </tr>
    
                <tr>
                    <th>Article No</th>
                    <td><?php echo e($inverty->articleNo); ?></td>
                </tr>
    
                <tr>
                        <th>Color</th>
                        <td><?php echo e($location); ?></td>
                    </tr>
                <tr>
                        <th>Collection</th>
                        <td><?php echo e($collection); ?></td>
                    </tr>
                <tr>
                    <th>Location</th>
                    <td>
                            <?php echo e($location); ?>

                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Inventory Quantity</th>
                    <td>
                        <?php echo e(($invertyCount)); ?> 
                    </td>
                </tr>
                <tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           

            </tbody>
        </table>
        <a href="<?php echo e(route('admin.delivery')); ?>" class="btn btn-danger">Delivery home</a>
        
    </div>
    <script>
            // Get the modal
            var modal = document.getElementById('myModal');
            // var img=document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
           
              function displayIMG(clicked_id)
            {
                modal.style.display = "block";
                modalImg.src = document.getElementById(clicked_id).src;
                captionText.innerHTML =document.getElementById(clicked_id).alt;
            }  
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
                modal.style.display = "none";
            }
            </script>
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>