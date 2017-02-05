    <?php $__env->startSection('stylesheets'); ?>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('title', ' | About'); ?>

    <?php $__env->startSection('content'); ?>
        <div class="row">
            <div class="col-md-8">
                <h1>About Me</h1>
                <hr>
                <div class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>

            <div class="col-md-3 col-md-offset-1">
              <h2>Sidebar</h2>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>