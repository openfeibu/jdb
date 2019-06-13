
<header>
    <div class="return" onclick="window.history.go(-1)"></div>
    <p>产品详情</p>
    <div class="menu"></div>
</header>
{!! Theme::widget('nav')->render() !!}
<div class="main">
    <div class="productDetail">
        <div class="productDetail-top">
            <div class="img"><img src="{{ url('image/original/'.$product->image) }}" alt=""></div>
            <div class="name">{{ $product['name'] }} {{ $product->category->name }}</div>
            @if($product['company'])<div class="form"> <i class="fb-inlineBlock"><img src="{!! theme_asset("images/rz.png") !!}" alt=""></i><span class="fb-inlineBlock">{{ $product['company'] }}</span></div>@endif
            <div class="money">
                <label for="">建议零售价</label>
                <span>{{ $product['price'] }}元</span>
            </div>
        </div>
        <div class="productDetail-des">
            <div class="productDetail-title">{{ $product['name'] }}</div>
            <div class="productDetail-des-con">
                {!! $product['content'] !!}
            </div>
        </div>
    </div>
</div>
<div class="fcopy">
    {!! setting('right') !!}
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
