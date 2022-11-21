
<?php $__env->startSection('content'); ?>

<?php $locale = session()->get('locale'); ?>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo app('translator')->get('lang.text_hello'); ?> <?php echo e($name); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php if(auth()->guard()->guest()): ?>  
            <a class="nav-link" href="<?php echo e(route('user.registration')); ?>">Registration</a>
            <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
        <?php else: ?>
            <a class="nav-link" href="<?php echo e(route('blog.forum')); ?>">Forum</a>
            <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
        <?php endif; ?>
            <a class="nav-link <?php if($locale=='en'): ?> bg-secondary <?php endif; ?>" href="<?php echo e(route('lang', 'en')); ?>">En <i class="flag flag-canada"></i></a>    
            <a class="nav-link <?php if($locale=='fr'): ?> bg-secondary <?php endif; ?>" href="<?php echo e(route('lang', 'fr')); ?>">Fr <i class="flag flag-france"></i></a> 
            
      </div>
    </div>
  </div>
</nav>


  <div class="">
      <div class="">
          <div class="">
                          <h1> Bienvenu sur votre tableau de bord </h1>
                          <p>   <?php echo e($name); ?> </p>
          </div>
      </div>

  </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Users\www\MaisonneuveE2194801\MaisonneuveE2194801\resources\views/dashboard.blade.php ENDPATH**/ ?>