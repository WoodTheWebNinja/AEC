

<?php $__env->startSection('content'); ?>

<h1 class=""> Ajouter  Un Eleve </h1>

<form action="" method="post">
    <?php echo csrf_field(); ?>
        <div class="card-header">
            Formulaire
        </div>
        <div class="card-body">   
                <div class="control-group col-12">
                    <label for="nom">Nom Étudiant</label>
                    <input type="text" id="nom" name="nom" class="form-control">
                </div>
                <div class="control-group col-12">
                    <label for="adresse">adresse</label>
                    <input type="text" id="adresse" name="adresse" class="form-control">

                </div>
                <div class="control-group col-12">
                    <label for="phone">phone</label>
                    <input type="text" id="phone" name="phone" class="form-control">

                </div>

                <div class="control-group col-12">
                    <label for="email">email</label>
                    <input type="text" id="email" name="email" class="form-control">

                </div>

                <div class="control-group col-12">
                    <label for="date_de_naissance">date_de_naissance</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control">

                </div>


                <div class="control-group col-12">
                    <label for="villes">Ville</label>
                    <select name="villes_id" id="villes" class="form-control">
                        <option value="">Selectionnez une ville</option>
                    <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($villes->id); ?>"><?php echo e($villes->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\www\MaisonneuveE2194801\MaisonneuveE2194801\resources\views/etudiant/add.blade.php ENDPATH**/ ?>