<header>
    <div class="logo"><a href=""><img src="{!! logo() !!}" alt=""></a></div>
    <div class="menu"></div>
</header>

{!! Theme::widget('nav')->render() !!}

<div class="main">
    <div class="banner">
        <div class="swiper-container swiper-container-banner">
            <div class="swiper-wrapper">
                @foreach($banners as $key => $banner_item)
                    <div class="swiper-slide"><img src="{{ url('image/original/'.$banner_item['image']) }}" alt="{{ $banner_item['title'] }}"></div>
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination-banner"></div>
        </div>
    </div>
    <div class="homeAbout fb-clearfix">
        <div class="homeAbout-con">
            <h2>{{ page('about-company','title') }}</h2>
            {!! page('about-company','content') !!}
        </div>
    </div>
    <div class="case">
        <div class="title">
            <p>产品中心</p>
            <span>我们未来会更加努力，打造更多好产品。期待与您合作！</span>
        </div>
        <div class="case-con">
            <?php $products = app('product_repository')->getProducts(4);?>
            @foreach($products as $key => $product)
            <div class="case-item fb-inlineBlock" >
                <a href="{{ route('wap.product.show',['id' => $product->id]) }}">
                    <div class="img"> <img src="{{ url('/image/original/'.$product['image']) }}" alt=""></div>
                    <div class="test fb-overflow-1">{{ $product['name'] }}</div>
                </a>
            </div>
            @endforeach
        </div>
        <a href="{{ route('wap.product.index') }}" class="btn3">查看更多</a>
    </div>
    <div class="hNew">
        <div class="title">
            <p>新闻资讯</p>
        </div>
        <div class="hNew-con">
            <div class="hNew-con-item">
                <ul>
                    <?php $new_news_list = app('page_repository')->getPages('news',5);?>
                    @foreach($new_news_list as $key => $news)
                        <li><a href="{{ route('wap.news.show',['id' => $news['id']]) }}">{{ $news['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>
        <a href="{{ route('wap.news.index') }}" class="btn3">全部资讯</a>
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
                    @foreach(app('link_repository')->getLinksByCategory('partners') as $key => $link_item)
                        @if($i%3 == 0)
                        <div class="swiper-slide swiper-no-swiping ">
                        @endif
                            <img src="{{ url('image/original/'.$link_item['image']) }}" alt="">
                        @if(($i+1)%3==0 && $i!=0)
                        </div>
                        @endif
                        <?php $i++?>
                    @endforeach

                </div>
            </div>

        </div>

    </div>

</div>
