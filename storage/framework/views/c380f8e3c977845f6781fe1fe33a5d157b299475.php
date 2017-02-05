<?php $__env->startSection('title', " | $post->title"); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1><?php echo e($post->title); ?></h1>
			<hr>
			<div class="lead"><?php echo $post->body; ?></div>
			<div>
				<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<span class="label label-primary"><?php echo e($tag->name); ?></span>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<p><?php echo e($post->author); ?> | <?php echo e($post->category->name); ?></p>
			<h5>Published : <?php echo e(date('M j, Y', strtotime($post->created_at))); ?></h5>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>