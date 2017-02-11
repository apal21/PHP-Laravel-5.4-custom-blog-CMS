<?php $__env->startSection('title', " | $category->name Category"); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-8">
            <h1><?php echo e($category->name); ?> Category <small><?php echo e($category->posts()->count()); ?>

                <?php if($category->posts()->count() == 1): ?>
                    Post
                <?php else: ?> Posts
                <?php endif; ?>
            </small></h1>
        </div>
    </div>

    <div>
        <div class="col-md-12">
            <?php if($category->posts()->count() > 0): ?>
            <table class="table lead">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $category->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($post->id); ?></td>
                        <td><?php echo e($post->title); ?></td>
                        <td>
                            <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-default btn-sm btn-block pull-right">View</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>