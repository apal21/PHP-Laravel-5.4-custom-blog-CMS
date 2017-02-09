<?php $__env->startSection('title', ' | Post'); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="container">
			<h1><?php echo e($post->title); ?></h1>
		</div>

			<hr>
		<div class="col-md-8">
			<div class="lead"><?php echo $post->body; ?></div>
			<div>
				<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<span class="label label-primary"><?php echo e($tag->name); ?></span>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<hr>
			<div id="backend-comments" style="form-spacing-top">
				<h3>Comments <small><?php echo e($post->comments()->count()); ?> Comments</small></h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($comment->name); ?></td>
							<td><?php echo e($comment->email); ?></td>
							<td><?php echo e($comment->comment); ?></td>
							<td>
							<a href="<?php echo e(route('comments.edit', $comment->id)); ?>" class="btn btn-xs btn-primary glyphicon glyphicon-pencil"></a>
							<a href="<?php echo e(route('comments.delete', $comment->id)); ?>" class="btn btn-xs btn-danger glyphicon glyphicon-trash"></a>
								</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Category:</dt>
					<dd><p><?php echo e($post->category->name); ?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Author:</dt>
					<dd><?php echo e($post->author); ?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd><?php echo e(date('M j, Y' , strtotime($post->created_at))); ?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated At:</dt>
					<dd><?php echo e(date('M j, Y' , strtotime($post->updated_at))); ?></dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<?php echo Html::linkroute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')); ?>

					</div>
					<div class="col-sm-6">
						<?php echo Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete' ]); ?>


						<?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-block']); ?>


						<?php echo Form::close(); ?>

					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12">
						<?php echo Html::linkroute('posts.show', 'All Posts', null, array('class' => 'btn btn-default btn-block')); ?>

					</div>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>