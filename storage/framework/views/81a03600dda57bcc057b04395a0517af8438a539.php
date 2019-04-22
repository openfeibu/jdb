<header>
    <div class="logo"><a href=""><img src="<?php echo logo(); ?>" alt=""></a></div>
    <div class="menu"></div>
</header>

<?php echo Theme::widget('nav')->render(); ?>


<div class="main">
    <div class="banner">
        <div class="swiper-container swiper-container-banner">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide"><img src="<?php echo e(url('image/original/'.$banner_item['image'])); ?>" alt="<?php echo e($banner_item['title']); ?>"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="swiper-pagination swiper-pagination-banner"></div>
        </div>
    </div>
    <div class="homeAbout fb-clearfix">
        <div class="homeAbout-con">
            <h2><?php echo e(page('about-company','title')); ?></h2>
            <?php echo page('about-company','content'); ?>

        </div>
    </div>
    <div class="case">
        <div class="title">
            <p>产品中心</p>
            <span>我们未来会更加努力，打造更多好产品。期待与您合作！</span>
        </div>
        <div class="case-con">
            <?php $products = app('product_repository')->getProducts(4);?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="case-item fb-inlineBlock" >
                <a href="<?php echo e(route('wap.product.show',['id' => $product->id])); ?>">
                    <div class="img"> <img src="<?php echo e(url('/image/original/'.$product['image'])); ?>" alt=""></div>
                    <div class="test fb-overflow-1"><?php echo e($product['name']); ?></div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a href="<?php echo e(route('wap.product.index')); ?>" class="btn3">查看更多</a>
    </div>
    <div class="hNew">
        <div class="title">
            <p>新闻资讯</p>
        </div>
        <div class="hNew-con">
            <div class="hNew-con-item">
                <ul>
                    <?php $new_news_list = app('page_repository')->getPages('news',5);?>
                    <?php $__currentLoopData = $new_news_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('wap.news.show',['id' => $news['id']])); ?>"><?php echo e($news['title']); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

        </div>
        <a href="<?php echo e(route('wap.news.index')); ?>" class="btn3">全部资讯</a>
    </div>


    <div class="customer">
        <div class="title">
            <p>合作伙伴</p>
        </div>
        <div class="customer-con">
            <!-- Swiper -->
            <div class="swiper-container swiper-container-customer">
                <div class="swiper-wrapper">
                    <?php $i=0;?>
                    <?php $__currentLoopData = app('link_repository')->getLinksByCategory('partners'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $link_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($i%3 == 0): ?>
                        <div class="swiper-slide swiper-no-swiping ">
                        <?php endif; ?>
                            <img src="<?php echo e(url('image/original/'.$link_item['image'])); ?>" alt="">
                        <?php if(($i+1)%3==0 && $i!=0): ?>
                        </div>
                        <?php endif; ?>
                        <?php $i++?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>

        </div>

    </div>

</div>
