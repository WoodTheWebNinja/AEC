
<?php $__env->startSection('title','index'); ?>

<?php $__env->startSection('content'); ?>


        
    <div class="student__Title">

    <h1> Liste des Étudiants </h1>
    </div>

    <div class="btn"> <a href="etudiant-create"> Ajouter  </a></div>

    <div class="list__student">
       

        
    <?php  foreach($etudiants as $etudiants ): ?>

    <article class="tile_student" >
        <a href="/etudiant/<?php echo e($etudiants ->id); ?>">    
        <p class=""> <strong>id:</strong>  <?php echo e($etudiants ->id); ?></p> 
        <p class=""> <strong>Nom:</strong>  <?php echo e($etudiants ->nom); ?></p> 
        <p class=""> <strong>Adresse:</strong>  <?php echo e($etudiants->phone); ?> </p> 
        <p class=""> <strong>City:</strong>  <?php echo e($etudiants->villeID); ?> </p> 


    </a> 
    </article>
    <?php  endforeach ?>

  
    </div>


    </body>
    </html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\MaisonneuveE2194801\MaisonneuveE2194801\resources\views/index.blade.php ENDPATH**/ ?>