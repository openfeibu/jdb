<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title></title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <?php echo Theme::asset()->styles(); ?>

    <?php echo Theme::asset()->scripts(); ?>

</head>
<body  ontouchstart >

<?php echo Theme::content(); ?>


</body>
<script>
    $(function(){
        var mySwiper = new Swiper ('.swiper-container-banner', {
            loop: true,
            autoplay:3000,
            autoHeight:true,
            autoplayDisableOnInteraction : false,
            // 如果需要分页器
            pagination: '.swiper-pagination-banner',
        })

        var swiper8= new Swiper('.swiper-container-customer', {
            slidesPerView: 3,
            slidesPerColumn: 1,
            spaceBetween: 10,
            autoplay:1,//自动滚动
            loop:true,//循环
            speed:5000,//滚动速度
            noSwiping : true,

        });
        $(".hNew-tab .hNew-tab-item").on("click",function(){
            var i =$(this).index(".hNew-tab-item");
            $(this).addClass("active").siblings(".hNew-tab-item").removeClass("active");
            $(".hNew-con .hNew-con-item").eq(i).fadeIn(200).siblings(".hNew-con-item").hide()
        })
    })
</script>
</html>