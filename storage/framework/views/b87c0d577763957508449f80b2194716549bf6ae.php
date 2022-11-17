
<?php $__env->startSection('title','index'); ?>

<?php $__env->startSection('content'); ?>


        
    <div class="student__Title">

    <h1> Liste des Étudiants </h1>
    </div>


    <div class="list__student">

    <?php  foreach($student as $student): ?>
    <article class="tile_student" >
    <?php  echo $student ?>
    </article>
    <?php  endforeach ?>


    <article class="tile_student" >
        <a href="/student/student-one">  
        <p class=""> <strong>Nom:</strong> Sirus Black</p> 
        <p class=""> <strong>Adresse:</strong></p> 
        </a> 
    </article>

    <article class="tile_student" >
        <a href="/student/student-two">  
        <p class=""> <strong>Nom:</strong> James Potter</p> 
        <p class=""> <strong>Adresse:</strong></p> 
        </a> 
    </article>

    <article class="tile_student" >
        <a href="/student/student-three">  
        <p class=""> <strong>Nom:</strong> Arthur Wesley </p> 
        <p class=""> <strong>Adresse:</strong></p> 
        </a> 
    </article>

    </div>


    </body>
    </html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\AEC\TP\MaisonneuveE2194801\resources\views/index.blade.php ENDPATH**/ ?>