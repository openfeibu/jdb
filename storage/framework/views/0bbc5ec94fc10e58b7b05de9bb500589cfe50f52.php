
<header>
    <div class="return" onclick="window.history.go(-1)"></div>
    <p>资讯</p>
    <div class="menu"></div>
</header>
<?php echo Theme::widget('nav')->render(); ?>


<div class="main">
    <div class="pbanner"><img src="<?php echo theme_asset("images/new.jpg"); ?>" alt=""></div>
    <div class="new">

        <div class="new-con">
            <?php $__currentLoopData = $news_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="new-item " >
                    <a href="<?php echo e(route('wap.news.show',['id' => $news['id']])); ?>">
                        <div class="test">
                            <div class="t"><?php echo e($news['title']); ?></div>
                            <div class="d"><?php echo e(format_date($news['created_at'],'Y-m-d')); ?> </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <?php echo $news_list->links('common.pagination'); ?>


    </div>
</div>


<script>
    $(function(){
        var caseTab= new Swiper('.swiper-container-caseTab', {

            spaceBetween: 10,
            slidesPerView :'5.2' ,
            slidesOffsetAfter : 30,
        });
    })
</script>
