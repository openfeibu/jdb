
<header>
    <div class="return" onclick="window.history.go(-1)"></div>
    <p>资讯详情</p>
    <div class="menu"></div>
</header>
<?php echo Theme::widget('nav')->render(); ?>

<div class="main">
    <div class="caseDetail">
        <div class="caseDetail-title"><?php echo e($news['title']); ?></div>
        <div class="caseDetail-date"><?php echo e(format_date($news['created_at'],'Y-m-d')); ?></div>
        <div class="caseDetail-con">
            <?php echo $news['content']; ?>

        </div>
    </div>

</div>

<script>
    $(function(){

        var aboutCase = new Swiper('.swiper-container-aboutCase', {
            slidesPerView: 2.2,
            spaceBetween: 10,
            slidesOffsetAfter :10,
        });
    })
</script>
