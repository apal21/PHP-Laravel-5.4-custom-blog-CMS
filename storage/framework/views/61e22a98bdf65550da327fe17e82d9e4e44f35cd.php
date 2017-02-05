<?php $__env->startSection('title', ' | Edit Tag'); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="well">
				<?php echo e(Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT'])); ?>

				
				<?php echo e(Form::label('name', 'Name :')); ?>

				<?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>


				<?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success btn-block form-spacing-top'])); ?>


				<?php echo e(Form::close()); ?>

			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>