
<?php $__env->startSection('content'); ?>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 pt-4">
                    <div class="card">
                        <h3 class="card-header text-center">
                            Login
                        </h3>
                        <div class="card-body">
                        <?php if(session('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session('success')); ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        <?php endif; ?>
                        <?php if($errors): ?>
                            <ul>
                              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class='text-danger'><?php echo e($error); ?></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>                     
                        <?php endif; ?>

                            <form action="<?php echo e(route('login.authentication')); ?>" method="post">
                                <?php echo csrf_field(); ?>
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
                                    <input type="submit" value="Connecter" class="btn btn-dark btn-block">
                                </div>
                            </form>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\www\MaisonneuveE2194801\MaisonneuveE2194801\resources\views/auth/index.blade.php ENDPATH**/ ?>