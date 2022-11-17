
<?php $__env->startSection('title','Etudiant'); ?>

<?php $__env->startSection('content'); ?>
    <body>
    <div class="card  text-center ">
        <div class="card-header">

        <h1> Fiche Etudiant </h1>
        </div>
    </div>

        <div class="card">

            <article class="card-body" >
            
                <p class=""> <strong>id:</strong>  <?php echo e($etudiant ->id); ?></p> 
                <p class=""> <strong>Nom:</strong>  <?php echo e($etudiant ->nom); ?></p> 
                <p class=""> <strong>email:</strong>  <?php echo e($etudiant->email); ?> </p> 
                <p class=""> <strong>Date de Naissance:</strong>  <?php echo e($etudiant->date_de_naissance); ?> </p> 
                <p class=""> <strong>Adresse:</strong>  <?php echo e($etudiant->phone); ?> </p> 
                <a href="<?php echo e(route('etudiant.edit', $etudiant->id)); ?>" class="btn btn-success">Mettre a jour</a>
               <!--   <a href="/etudiant-edit/<?php echo e($etudiant ->id); ?>" class="btn btn-primary">Mettre a jour</a>  -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Effacer
                    </button>      
        
            </article>


        </div>

        <div class="card-footer text-center"> 
   
      <a href="/index" class="btn btn-primary btn-lg">Liste Étudiants</a>
        </div>



        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo e(route('etudiant.edit', $etudiant->id)); ?>"  method="post">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Etes-vous certain d'effacer cet Étudiant : <p><?php echo e($etudiant ->nom); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Effacer</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>



</body>














<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\MaisonneuveE2194801\MaisonneuveE2194801\resources\views/etudiant.blade.php ENDPATH**/ ?>