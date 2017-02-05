<!DOCTYPE html>
<html lang="en">

  <head>

     <?php echo $__env->make('partials._head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     
  </head>

  <body>
    
    <?php echo $__env->make('partials._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container">
      
      <?php echo $__env->make('partials._messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <?php echo $__env->yieldContent('content'); ?>

      <?php echo $__env->make('partials._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <?php echo $__env->make('partials._javascript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <?php echo $__env->yieldContent('scripts'); ?>

  </body>
</html>