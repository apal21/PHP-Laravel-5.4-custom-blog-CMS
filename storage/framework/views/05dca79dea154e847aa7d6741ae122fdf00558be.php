<?php $__env->startSection('title', ' | All Blogs'); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-10">
			<h1>All posts</h1>
		</div>
		<div class="col-md-2">
			<a href="<?php echo e(route('posts.create')); ?>" class="btn btn-lg btn-lg btn-primary btn-h1-spacing">Create New Blog</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
					
			<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-9">
				<div>
					<h2><?php echo e($post->title); ?></h2>
				</div>
				<div class="lead">
					<?php echo substr($post->body, 0, 150); ?> <?php echo e(strlen($post->body) > 150 ? "..." : ""); ?>

				</div>
				<div>
					<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<span class="label label-primary"><?php echo e($tag->name); ?></span>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div>
					<p><?php echo e($post->author); ?> | <?php echo e($post->category->name); ?></p>
				</div>
				<div>
					<?php echo e(date('M j, Y' , strtotime($post->created_at))); ?>

				</div>
			</div>
			<div class="col-md-3 btn-h1-spacing">
				<a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-default btn-block btn">View</a><a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-default btn-block">Edit</a>
			</div>
			<div class="col-md-12">
				<hr>
			</div>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<div class="text-center">
			<?php echo $posts->links();; ?>

		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>