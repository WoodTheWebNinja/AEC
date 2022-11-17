
<?php $__env->startSection('title','Etudiant'); ?>

<?php $__env->startSection('content'); ?>
    <body>
        
    <div class="student__Title">

    <h1> Fiche Etudiant </h1>
    </div>



    <div class="fiche__student">


    <?php  echo $student ?>


    </div>

    <div class="btn-return">
    <a href="/index">Liste Étudiants</a>
    </div>

</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\www\MaisonneuveE2194801\resources\views/student.blade.php ENDPATH**/ ?>