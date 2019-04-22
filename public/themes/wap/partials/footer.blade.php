<div class="footer">
    <div class="ftell">
        <div class="ftell-title">
            <i><img src="{!! theme_asset('images/tell.png') !!}" alt="" /></i>
            联系我们
        </div>
        <p>客服热线：<a href="tel:{{ setting('tel') }}">{{ setting('tel') }}</a></p>
        <p>联系方式：<a href="tel:{{ setting('iphone') }}">{{ setting('iphone') }}</a>（刘生，微信同号）</p>
        <p>官方邮箱：{{ setting('email') }}</p>

    </div>
    <div class="adress">
        <div class="adress-title">
            <i><img src="{!! theme_asset('images/address.png') !!}" alt="" /></i>
            我们的地址
        </div>
        <p>{{ setting('address') }}</p>
    </div>
    <div class="fcode fb-clearfix">
        <div class="fcode-item fb-float-left" style="margin-right: 1.8rem">
            <p>获取最新资讯</p>
            <img src="{{ url('image/original/'.setting('news_wechat_image')) }}" alt="">
        </div>
        <div class="fcode-item fb-float-left">
            <p>官方微信</p>
            <img src="{{ url('image/original/'.setting('wechat_image')) }}" alt="">
        </div>
    </div>
    <div class="copy">
        {!! setting('right') !!}
        技术支持：<a href="http://www.feibu.info">飞步科技 </a>
    </div>
</div>
<div class="getInfo">
    <a href="tel:{{ setting('iphone') }}">获取产品报价（刘生）</a>
</div>