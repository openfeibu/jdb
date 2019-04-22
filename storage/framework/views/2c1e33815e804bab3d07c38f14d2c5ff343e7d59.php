
<header>
    <div class="return" onclick="window.history.go(-1)"></div>
    <p>产品详情</p>
    <div class="menu"></div>
</header>
<?php echo Theme::widget('nav')->render(); ?>

<div class="main">
    <div class="productDetail">
        <div class="productDetail-top">
            <div class="img"><img src="<?php echo e(url('image/original/'.$product->image)); ?>" alt=""></div>
            <div class="name"><?php echo e($product['name']); ?> <?php echo e($product->category->name); ?></div>
            <div class="form"> <i class="fb-inlineBlock"><img src="<?php echo theme_asset("images/rz.png"); ?>" alt=""></i><span class="fb-inlineBlock"><?php echo e(setting('company_name')); ?></span></div>
            <div class="money">
                <label for="">建议零售价</label>
                <span><?php echo e($product['price']); ?>元</span>
            </div>
        </div>
        <div class="productDetail-des">
            <div class="productDetail-title"><?php echo e($product['name']); ?></div>
            <div class="productDetail-des-con">

                <?php echo $product['content']; ?>

            </div>
        </div>
    </div>
</div>
<div class="fcopy">
    <?php echo setting('right'); ?>

    技术支持：<a href="http://www.feibu.info">飞步科技 </a>
</div>



<script>
    $(function(){
        var caseTab= new Swiper('.swiper-container-caseTab', {

            spaceBetween: 10,
            slidesPerView :'4.2' ,
            slidesOffsetAfter : 30,
        });
    })
</script>
