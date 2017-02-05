<?php $__env->startSection('title', ' | Blog'); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-12">
			<h1>Blog</h1>
		</div>
	</div>
	
	<hr>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<h2><?php echo e($post->title); ?></h2>
			<div class="lead"> <?php echo substr($post->body, 0, 150); ?> <?php echo e(strlen($post->body) > 150 ? "..." : ""); ?> </div>
			<div>
				<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<span class="label label-danger"><?php echo e($tag->name); ?></span>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<p><?php echo e($post->author); ?> | <?php echo e($post->category->name); ?></p>
			<h5>Published : <?php echo e(date('M j, Y', strtotime($post->created_at))); ?></h5>
			<a href="<?php echo e(url('blog/'.$post->slug)); ?>" class="btn btn-primary btn-md">Read More</a>
			<hr>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<div class="col-md-12">

			<div class="text-center">
	    	    <?php echo $posts->links();; ?>

		    </div>

	    </div>

	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>