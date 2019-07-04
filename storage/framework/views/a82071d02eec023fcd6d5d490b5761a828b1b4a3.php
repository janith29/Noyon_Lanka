<?php $__env->startSection('title', "Inventory Management"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
           

            <tr>
                <th>Article No</th>
                <td><?php echo e($inverty->articleNo); ?></td>
            </tr>

            <tr>
                    <th>Color</th>
                    <td><?php echo e($inverty->color); ?></td>
                </tr>
            <tr>
                    <th>Collection</th>
                    <td><?php echo e($inverty->collection); ?></td>
                </tr>
            <tr>
                <th>Location</th>
                <td>
                        <?php echo e($inverty->location); ?>

                    </a>
                </td>
            </tr>
            <tr>
                <th>Inventory Quantity</th>
                <td>
                    <?php echo e(($inverty->qty)); ?> 
                </td>
            </tr>
            </tbody>
        </table>
        <a href="<?php echo e(route('admin.inventory')); ?>" class="btn btn-danger">Book home</a>
        <a class="btn btn-info" href="<?php echo e(route('admin.inventory.edit',[$inverty->id])); ?>">Edit</a>
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