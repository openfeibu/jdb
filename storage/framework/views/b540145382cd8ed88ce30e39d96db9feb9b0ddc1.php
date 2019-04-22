<div class="nav">
    <div class="nav-header">
        <div class="logo"><a href=""><img src="<?php echo logo(); ?>" alt=""></a></div>
        <div class="close"></div>
    </div>
    <div class="nav-list">
        <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="nav-item <?php echo e(active_class($item->active)); ?>">
                <a href="<?php echo e($item->url); ?>"><?php echo e($item->name); ?></a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>