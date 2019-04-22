
<header>
    <div class="return" onclick="window.history.go(-1)"></div>
    <p>产品中心</p>
    <div class="menu"></div>
</header>
{!! Theme::widget('nav')->render() !!}
<div class="main">
    <div class="case-tab">
        <div class="swiper-container swiper-container-company2 swiper-container-caseTab">
            <div class="swiper-wrapper">
                @foreach($categories as $key=> $category)
                <div class="swiper-slide " style="">
                    <div class="aBox @if($category_id == $category['id']) active @endif" >
                        <a href="{{ route('wap.product.index',['category_id' => $category['id']]) }}">{{ $category['name'] }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="case">

        <div class="case-con">
            @foreach($products as $key => $product)
            <div class="case-item fb-inlineBlock" >
                <a href="{{ route('wap.product.show',['id' => $product->id]) }}">
                    <div class="img"> <img src="{{ url('/image/original/'.$product['image']) }}" alt="{{ $product['name'] }}"></div>
                    <div class="test fb-overflow-1">{{ $product['name'] }}</div>
                </a>
            </div>
            @endforeach
        </div>
        {!! $products->links('common.pagination') !!}
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
