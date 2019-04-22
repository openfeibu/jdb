
<header>
    <div class="return" onclick="window.history.go(-1)"></div>
    <p>产品中心</p>
    <div class="menu"></div>
</header>
<?php echo Theme::widget('nav')->render(); ?>

<div class="main">
    <div class="case-tab">
        <div class="swiper-container swiper-container-company2 swiper-container-caseTab">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide " style="">
                    <div class="aBox <?php if($category_id == $category['id']): ?> active <?php endif; ?>" >
                        <a href="<?php echo e(route('wap.product.index',['category_id' => $category['id']])); ?>"><?php echo e($category['name']); ?></a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="case">

        <div class="case-con">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="case-item fb-inlineBlock" >
                <a href="<?php echo e(route('wap.product.show',['id' => $product->id])); ?>">
                    <div class="img"> <img src="<?php echo e(url('/image/original/'.$product['image'])); ?>" alt="<?php echo e($product['name']); ?>"></div>
                    <div class="test fb-overflow-1"><?php echo e($product['name']); ?></div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php echo $products->links('common.pagination'); ?>

    </div>
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
