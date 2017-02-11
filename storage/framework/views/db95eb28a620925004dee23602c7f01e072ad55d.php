<?php $__env->startSection('title', ' | Edit Post'); ?>

<?php $__env->startSection('stylesheets'); ?>

	<?php echo Html::style('css/select2.min.css'); ?>

	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  	
  	<script>
  		tinymce.init({
  			selector:'textarea',
  			plugins: 'code,preview,link,autolink,lists,spellchecker,pagebreak,layer,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template'
  		});
  	</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container">
		<div class="row">
			<h1>Edit</h1>
		</div>
	</div>

	<hr>

	<div class="row">

		<?php echo Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]); ?>

		<div class="col-md-8">

			<?php echo e(Form::label('title', 'Title :')); ?>

			<?php echo e(Form::text('title', null, ['class' => 'form-control input-lg'])); ?>


			<?php echo e(Form::label('slug', 'Slug(URL) :')); ?>

			<?php echo e(Form::text('slug', null, ['class' => 'form-control input-lg'])); ?>


			<?php echo e(Form::label('category_id', 'Category :')); ?>

			<?php echo e(Form::select('category_id', $categories, null, ['class' => 'form-control input-lg'])); ?>


			<?php echo e(Form::label('tags', 'Tags :')); ?>

			<?php echo e(Form::select('tags[]', $tags, null, ['class' => 'form-control input-lg select2-multiple', 'multiple' => 'multiple'])); ?>


			<?php echo e(Form::label('featured_image', 'Update Featured Image:')); ?>

			<?php echo e(Form::file('featured_image')); ?>


			<?php echo e(Form::label('body', 'Body :')); ?>

			<?php echo e(Form::textarea('body', null, ['class' => 'form-control input-lg'])); ?>


		</div>

		<div class="col-md-4">
			<div class="well">
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
						<?php echo Html::linkroute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')); ?>

					</div>
					<div class="col-sm-6">
						<?php echo e(Form::submit('Save', ['class' => 'btn btn-success btn-block'])); ?>

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
		<?php echo Form::close(); ?>


	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

	<?php echo Html::script('js/select2.full.min.js'); ?>

	<script type="text/javascript">
		$(".select2-multiple").select2();
		$(".select2-multiple").select2().val(<?php echo json_encode($post->tags->pluck('id')); ?>).trigger('change');
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>