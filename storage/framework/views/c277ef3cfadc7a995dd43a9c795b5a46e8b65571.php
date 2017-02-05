<?php $__env->startSection('title', ' | Tags'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
				<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($tag->id); ?></td>
						<td><a href="<?php echo e(route('tags.show', $tag->id)); ?>" class="nolink"><?php echo e($tag->name); ?></a></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
		<div class="col-md-3 col-md-offset-1">
			<div class="well">
				<?php echo e(Form::open(['route' => 'tags.store'])); ?>

				<h2>New Tag</h2>

				<?php echo e(Form::label('name', 'Name :')); ?>

				<?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>


				<?php echo e(Form::submit('Add Tag', ['class' => 'btn btn-success btn-block login-spacing-top'])); ?>

			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>