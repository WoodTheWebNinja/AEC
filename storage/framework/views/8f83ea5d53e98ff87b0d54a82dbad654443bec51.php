
<?php $__env->startSection('content'); ?>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 pt-4">
                    <div class="card">
                        <h3 class="card-header text-center">
                            Enregistrer
                        </h3>
                        <div class="card-body">
                            <?php if(session('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>
                            <form action="<?php echo e(route('user.store')); ?>" method="post">
                                <?php echo csrf_field(); ?>                               

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Nom Étudiant" class="form-control" name="nom" value="<?php echo e(old('nom')); ?>">
                                    <?php if($errors->has('nom')): ?>
                                        <div class="text-danger mt-2">
                                            <?php echo e($errors->first('nom')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="adresse" class="form-control" name="adresse" value="<?php echo e(old('adresse')); ?>">
                                    <?php if($errors->has('adresse')): ?>
                                        <div class="text-danger mt-2">
                                            <?php echo e($errors->first('adresse')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Téléphone" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>">
                                    <?php if($errors->has('phone')): ?>
                                        <div class="text-danger mt-2">
                                            <?php echo e($errors->first('phone')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>

                             

                                <div class="form-group mb-3">
                                    <input type="date" placeholder="Date de naissance" class="form-control" name="date_de_naissance" value="<?php echo e(old('date_de_naissance')); ?>">
                                    <?php if($errors->has('date_de_naissance')): ?>
                                        <div class="text-danger mt-2">
                                            <?php echo e($errors->first('date_de_naissance')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>


                                <div class="form-group mb-3">
                                    <select name="villes_id" id="villes" class="form-control">
                                        <option value="">Selectionnez une ville</option>
                                    <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($villes->id); ?>"><?php echo e($villes->nom); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                
                                <div class="form-group mb-3">
                                    <input type="email" placeholder="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
                                    <?php if($errors->has('email')): ?>
                                        <div class="text-danger mt-2">
                                            <?php echo e($errors->first('email')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="password" class="form-control" name="password">
                                    <?php if($errors->has('password')): ?>
                                        <div class="text-danger mt-2">
                                            <?php echo e($errors->first('password')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="d-grid mx-auto">
                                    <input type="submit" value="Sauvegarder" class="btn btn-dark btn-block">
                                </div>
                            </form>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\MaisonneuveE2194801\MaisonneuveE2194801\resources\views/auth/create.blade.php ENDPATH**/ ?>