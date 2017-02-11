  <?php $__env->startSection('stylesheets'); ?>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('title', ' | Home'); ?>

  <?php $__env->startSection('content'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>Hello World</h1>
                    <p>Laravel 5.4 
                    <br>Description</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">

              <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <div class="post">
                <h2><?php echo e($post->title); ?></h2>
                <div class="lead"><?php echo substr(strip_tags($post->body), 0, 150); ?> <?php echo e(strlen(strip_tags($post->body)) > 150 ? "..." : ""); ?></div>
                <div>
                  <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="label label-danger"><?php echo e($tag->name); ?></span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <p><?php echo e($post->author); ?> | <?php echo e($post->category->name); ?></p>
                <p><?php echo e(date('M j, Y', strtotime($post->created_at))); ?></p>
                <a href="<?php echo e(url('blog/'.$post->slug)); ?>" class="btn btn-primary btn-md">Read More</a>
              </div>
              <hr>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <div class="col-md-3 col-md-offset-1 well">
              <h2>Recent Posts</h2>
              
              <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><span class="glyphicon glyphicon-paperclip"></span> <a href="<?php echo e(url('blog/'.$recent->slug)); ?>" class="nolink"><?php echo e($recent->title); ?></a></p>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="text-center">
          <?php echo $posts->links();; ?>

        </div>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('scripts'); ?>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>