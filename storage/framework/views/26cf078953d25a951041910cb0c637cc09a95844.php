    <?php $__env->startSection('stylesheets'); ?>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('title', ' | Contact'); ?>

    <?php $__env->startSection('content'); ?>
        <div class="row">
            <div class="col-md-8">
                <h1>Contact Me</h1>

                <hr>
                
                <form method="post" action="<?php echo e(url('contact')); ?>">
                <?php echo e(Form::open(['url' => 'contact', 'method' => 'post'])); ?>

                    <div class="form-group">
                        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name'])); ?>

                    </div>

                    <div class="form-group">
                        <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email'])); ?>

                    </div>

                    <div class="form-group">
                        <?php echo e(Form::textarea('subject', null, ['class' => 'form-control', 'placeholder' => 'Subject', 'rows' => '5'])); ?>

                    </div>

                    <div class="form-group">
                        <?php echo e(Form::submit('Send Message', ['class' => 'btn btn-success'])); ?>

                    </div>
                <?php echo e(Form::close()); ?>

            </div>

            <div class="col-md-3 col-md-offset-1">
              <h2>Sidebar</h2>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>