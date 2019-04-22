<?php if($paginator->hasPages()): ?>
    <div class="product-page">
        
        <?php if($paginator->onFirstPage()): ?>
            <div class="product-page-prev"><a href="javascript:;">第一页</a></div>
        <?php else: ?>
            <div class="product-page-prev"><a href="<?php echo e($paginator->previousPageUrl()); ?>">上一页</a></div>
        <?php endif; ?>
        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <a href="javascript:;" class="active"><?php echo e($element); ?></a>
            <?php endif; ?>
            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <a href="javascript:;" class="active"><?php echo e($page); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($paginator->hasMorePages()): ?>
            <div class="product-page-next"><a href="<?php echo e($paginator->nextPageUrl()); ?>">下一页</a></div>
        <?php else: ?>
            <div class="product-page-next"><a href="javascript:;">最后一页</a></div>
        <?php endif; ?>
    </div>

<?php endif; ?>

<!--
<div class="product-page">
            <div class="product-page-prev"><a href="">《上一页</a></div>
            <a href="" class="active">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <div class="product-page-next"><a href="">下一页》</a></div>
        </div>
-->
