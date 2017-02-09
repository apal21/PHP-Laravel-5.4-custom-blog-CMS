<?php $__env->startSection('title', ' | Delete Comment'); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Delete this Comment?</h1>
			<div class="well">
				<p><strong>Name:</strong> <?php echo e($comment->name); ?></p>
				<p><strong>Email:</strong> <?php echo e($comment->email); ?></p>
				<p><strong>Comment:</strong> <?php echo e($comment->comment); ?></p>
			</div>

			<?php echo e(Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete'])); ?>


				<?php echo e(Form::submit('YES Delete', ['class' => 'btn btn-danger btn-block'])); ?>


			<?php echo e(Form::close()); ?>

		</div>
	</div>	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>