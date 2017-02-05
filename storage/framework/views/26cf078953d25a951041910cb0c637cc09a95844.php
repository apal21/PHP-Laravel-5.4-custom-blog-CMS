    <?php $__env->startSection('stylesheets'); ?>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('title', ' | Contact'); ?>

    <?php $__env->startSection('content'); ?>
        <div class="row">
            <div class="col-md-8">
                <h1>Contact Me</h1>

                <hr>
                
                <form method="post" action="<?php echo e(url('contact')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email" class="form-control">
                    </div>

                    <div class="form-group">
                        <textarea name="subject" placeholder="Subject" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Send Message" class="btn btn-success">
                    </div>
                </form>
            </div>

            <div class="col-md-3 col-md-offset-1">
              <h2>Sidebar</h2>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>