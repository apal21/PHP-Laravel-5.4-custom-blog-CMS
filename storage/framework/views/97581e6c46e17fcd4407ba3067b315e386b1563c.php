<?php $__env->startSection('title', " | $tag->name Tag"); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-8">
            <h1><?php echo e($tag->name); ?> Tag <small><?php echo e($tag->posts()->count()); ?>

                <?php if($tag->posts()->count() == 1): ?>
                    Post
                <?php else: ?> Posts
                <?php endif; ?>
            </small></h1>
        </div>
        <div class="col-md-2">
            <a href="<?php echo e(route('tags.edit', $tag->id)); ?>" class="btn btn-primary btn-block pull-right form-spacing-top">Edit</a>
        </div>
        <div class="col-md-2">
            <?php echo e(Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'delete'])); ?>

                <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger btn-block form-spacing-top'])); ?>

            <?php echo e(Form::close()); ?>

        </div>
    </div>

    <div>
        <div class="col-md-12">
            <table class="table lead">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tag->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($post->id); ?></td>
                        <td><?php echo e($post->title); ?></td>
                        <td>
                            <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="label label-danger"><?php echo e($tag->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-primary btn-sm btn-block pull-right">View</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>