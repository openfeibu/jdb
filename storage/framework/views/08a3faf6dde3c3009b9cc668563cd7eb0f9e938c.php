
<header>
    <div class="return" onclick="window.history.go(-1)"></div>
    <p>关于我们</p>
    <div class="menu"></div>
</header>

<?php echo Theme::widget('nav')->render(); ?>


<div class="main">
    <div class="p-banne">
        <img src="images/about.png" alt="">
    </div>
    <div class="homeAbout fb-clearfix">
        <div class="homeAbout-con">
            <h2><?php echo e($company['title']); ?></h2>
            <?php echo $company['content']; ?>

        </div>
    </div>
    <div id="allmap"></div>
</div>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=5jCnjnCesElvVDufg6yjGMrlYimVXk5f"></script>
<script>
    $(function(){
        // 百度地图API功能
        var map = new BMap.Map("allmap");
        var point = new BMap.Point('<?php echo e(setting('longitude')); ?>', '<?php echo e(setting('latitude')); ?>');
        map.centerAndZoom(point, 14);
        var marker = new BMap.Marker(point);  // 创建标注
        map.addOverlay(marker);               // 将标注添加到地图中
        // setTimeout(function(){
        //     map.panTo(new BMap.Point(114.076695,22.545247));
        // },100)

    })
</script>
