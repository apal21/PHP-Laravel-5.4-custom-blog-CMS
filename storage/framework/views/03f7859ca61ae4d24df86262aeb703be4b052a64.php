<?php $__env->startSection('title', ' | Edit Comments'); ?>

<?php $__env->startSection('content'); ?>

	<h1>Edit Comment</h1>

	<?php echo e(Form::model($comment, ['route' => ['comment.update', $comment->id], 'method' => 'put'])); ?>


		<?php echo e(Form::label('name', 'Name :')); ?>

		<?php echo e(Form::text('name', null, ['class' => 'form-control')); ?>


		<?php echo e(Form::label('email', 'Email :')); ?>

		<?php echo e(Form::text('email', null, ['class' => 'form-control')); ?>


		<?php echo e(Form::label('comment', 'Comment :')); ?>

		<?php echo e(Form::textarea('comment', null, ['class' => 'form-control')); ?>


		<?php echo e(Form::submit('Update', ['class' => 'btn btn-block btn-success'])); ?>


	<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>