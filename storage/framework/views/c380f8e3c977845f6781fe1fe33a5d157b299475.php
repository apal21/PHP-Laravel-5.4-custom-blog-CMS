<?php
	$titleTag = htmlspecialchars($post->title);
?>

<?php $__env->startSection('title', " | $titleTag"); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1><?php echo e($post->title); ?></h1>
			<hr>
			<div class="lead"><?php echo $post->body; ?></div>
			<div>
				<span class="glyphicon glyphicon-tags"></span>
				<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<span class="label label-primary"><?php echo e($tag->name); ?></span>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<p><?php echo e($post->author); ?> | <?php echo e($post->category->name); ?></p>
			<h5>Published : <?php echo e(date('M j, Y', strtotime($post->created_at))); ?></h5>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<?php if($post->comments->count() > 0): ?>
			<p class="lead">
				<strong><?php echo e($post->comments->count()); ?></strong>
				<span class="glyphicon glyphicon-comment"></span> 
				<?php if($post->comments->count() == 1 ): ?>
					Comment
				<?php else: ?>
					Comments
				<?php endif; ?>
					on this post</p>
				<hr>
			<?php endif; ?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="comment lead well">

					<img src="<?php echo e("https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email))) . "?s=50&d=mm"); ?>" class="author-image">
					<div class="author-name">
						<strong><?php echo e($comment->name); ?></strong> Says:
						<p class="comment-font"><small><?php echo e(date('M j, Y', strtotime($comment->created_at))); ?></small></p>
					</div>
					<div class="comment-content"><?php echo e($comment->comment); ?></div>
				</div>
				<hr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>				

	<div class="row form-spacing-top">
		<div id="comment-form" class="col-md-8 col-md-offset-2">
			<div class="lead">Add Comment</div>
			<?php echo e(Form::open(['route' => ['comments.store', $post->id], 'method' => 'post'])); ?>

				<div class="row">
					<div class="col-md-6">
						<?php echo e(Form::label('name', "Name :")); ?>

						<?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

					</div>
					<div class="col-md-6">
						<?php echo e(Form::label('email', "Email :")); ?>

						<?php echo e(Form::text('email', null, ['class' => 'form-control'])); ?>

					</div>
					<div class="col-md-12 form-spacing-top">
						<?php echo e(Form::label('comment', "Comment :")); ?>

						<?php echo e(Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5'])); ?>

					</div>
					<div class="col-md-12">
						<?php echo e(Form::submit('Post Comment', ['class' => 'btn btn-success btn-block form-spacing-top'])); ?>

					</div>
				</div>
			<?php echo e(Form::close()); ?>

		</div>
	</div>				

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>