<?php $__env->startSection('title', ' | Forgot Password'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    
                    <?php echo e(Form::open(['url' => 'password/reset', 'method' => 'post'])); ?>


                        <?php echo e(Form::hidden('token', $token)); ?>


                        <?php echo e(Form::label('email', 'Email :')); ?>

                        <?php echo e(Form::email('email', $email, ['class' => 'form-control'])); ?>


                        <?php echo e(Form::label('password', 'New Password :')); ?>

                        <?php echo e(Form::password('password', ['class' => 'form-control'])); ?>


                        <?php echo e(Form::label('password_confirmation', 'Confirm Password :')); ?>

                        <?php echo e(Form::password('password_confirmation', ['class' => 'form-control'])); ?>


                        <?php echo e(Form::submit('Reset Password', ['class' => 'btn btn-primary btn-block form-spacing-top'])); ?>


                    <?php echo e(Form::close()); ?>


                </div>
            </div>
        </div>
    </div>
                
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>