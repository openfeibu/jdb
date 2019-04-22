
<header>
    <div class="return" onclick="window.history.go(-1)"></div>
    <p>人才招聘</p>
    <div class="menu"></div>
</header>
<?php echo Theme::widget('nav')->render(); ?>


<div class="main">
    <div class="p-banner">
        <img src="<?php echo theme_asset("images/about.jpg"); ?>" alt="">

    </div>
    <div class="join ">

        <div class="jion-con">
            <div class="jion-list">
                <!-- <div class="jion-list-t">社会招聘</div> -->
                <?php $__currentLoopData = $recruits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recruit_key => $recruit_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="join-item">
                        <div class="join-item-t"><?php echo e($recruit_item['title']); ?></div>
                        <div class="join-item-n">
                            <span>招聘岗位：<?php echo e($recruit_item['post']); ?></span>
                            <span>汇报对象：<?php echo e($recruit_item['reports_to']); ?></span>
                        </div>
                        <dl>
                            <dt>岗位职责：</dt>
                            <?php echo $recruit_item['duty']; ?>

                        </dl>
                        <dl>
                            <dt>任职要求：</dt>
                            <?php echo $recruit_item['requirement']; ?>

                        </dl>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>

</div>
