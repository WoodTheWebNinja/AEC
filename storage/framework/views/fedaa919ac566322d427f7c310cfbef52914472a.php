<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name')); ?></title>

     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link  href="<?php echo e(asset('/assets/css/style.css')); ?>"  rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"  crossorigin="anonymous" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet" >
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
  

    <style>
      body {
        font-family: 'Open Sans', sans-serif;
      }
  </style>

    <title>Document</title>
</head>

<body>

  <!-- ======= Navbar ======= -->
  <nav class="">

  </nav>

             <!-- content-->

          
             <?php echo $__env->yieldContent('content'); ?>




        <!-- ======= Footer ======= -->
  <footer class="" role="">
    
  </footer>

  

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"  crossorigin="anonymous"></script>
   <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
</html><?php /**PATH D:\Users\www\MaisonneuveE2194801\MaisonneuveE2194801\resources\views/layout/master.blade.php ENDPATH**/ ?>