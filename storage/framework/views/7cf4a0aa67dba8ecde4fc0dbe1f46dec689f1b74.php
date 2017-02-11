<?php $__env->startSection('title', ' | New Post'); ?>

<?php $__env->startSection('stylesheets'); ?>

	<?php echo Html::style('css/parsley.css'); ?>

	<?php echo Html::style('css/select2.min.css'); ?>

	<!-- This looks stupid(js in stylesheets) but this is the best way -->
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  	
  	<script>
  		tinymce.init({
  			selector:'textarea',
  			plugins: 'code,preview,link,autolink,lists,spellchecker,pagebreak,layer,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template'
  		});
  	</script>
	

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>

			<?php echo Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]); ?>

			    
				<?php echo e(Form::label('title', 'Title :')); ?>

				<?php echo e(Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '256'))); ?>			

				<?php echo e(Form::label('slug', 'Slug(URL) :')); ?>

				<?php echo e(Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100'))); ?>


				<?php echo e(Form::label('category_id', 'Category :')); ?>

				<select class="form-control" name="category_id">
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>

				<?php echo e(Form::label('tags', 'Tags :')); ?>

				<select class="select2-multiple form-control" name="tags[]" multiple="multiple">
					<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>

				<?php echo e(Form::label('featured_image', 'Upload Featured Image:')); ?>

				<?php echo e(Form::file('featured_image')); ?>


				<?php echo e(Form::label('body', 'Body :')); ?>

				<?php echo e(Form::textarea('body', null, ['class' => 'form-control input-lg'])); ?>


				<?php echo e(Form::submit('Create New Post', array('class' => 'btn btn-success btn-lg btn-block form-spacing-top'))); ?>


			<?php echo Form::close(); ?>


		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

	<?php echo Html::script('js/parsley.min.js'); ?>

	<?php echo Html::script('js/select2.full.min.js'); ?>

	<script type="text/javascript">
		$(".select2-multiple").select2();
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>