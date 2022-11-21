

<?php $__env->startSection('content'); ?>

<h1 class=""> Forum </h1>

<form action="" method="post">
    <?php echo csrf_field(); ?>
        <div class="card-header">
            Ajotuer un article 
        </div>
        <div class="card-body">   
                <div class="control-group col-12">
                    <label for="nom">Titre</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="control-group col-12">
                    <label for="adresse">Article</label>
                    <input type="text" id="body" name="body" class="form-control">

                </div>

                <div class="control-group col-12">
                
                    <input type="text" id="user_id" name="user_id" class="form-control"value="<?php echo e($user); ?>">

                </div>
              
              
              
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\MaisonneuveE2194801\MaisonneuveE2194801\resources\views/blog/create.blade.php ENDPATH**/ ?>