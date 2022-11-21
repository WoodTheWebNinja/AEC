

<?php $__env->startSection('content'); ?>






<div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-one">
                 Forum 
                </h1>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <p>Forum pour les etudiants par des etudiants  </p>
                    </div>
                    <div class="col-md-4">
                    <p>Créer votre Forum </p>
                        <a href="<?php echo e(route('blog.create')); ?>" class="btn btn-primary">Ajouter</a>
                    </div>
                </div>    
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Liste des articles</h4>
                    </div>
                    <div class="card-body" >
                        <ul>
                        <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li><a href="<?php echo e(route('blog.show', $post->id)); ?>"><?php echo e($post->title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="text-danger">Aucun article de blog disponible</li>    
                        <?php endif; ?>
                        </ul>
                    </div>

                </div>
                                
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\www\MaisonneuveE2194801\MaisonneuveE2194801\resources\views/blog/forum.blade.php ENDPATH**/ ?>