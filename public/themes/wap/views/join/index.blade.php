
<header>
    <div class="return" onclick="window.history.go(-1)"></div>
    <p>人才招聘</p>
    <div class="menu"></div>
</header>
{!! Theme::widget('nav')->render() !!}

<div class="main">
    <div class="p-banner">
        <img src="{!! theme_asset("images/about.jpg") !!}" alt="">

    </div>
    <div class="join ">

        <div class="jion-con">
            <div class="jion-list">
                <!-- <div class="jion-list-t">社会招聘</div> -->
                @foreach($recruits as $recruit_key => $recruit_item)
                    <div class="join-item">
                        <div class="join-item-t">{{ $recruit_item['title'] }}</div>
                        <div class="join-item-n">
                            <span>招聘岗位：{{ $recruit_item['post'] }}</span>
                            <span>汇报对象：{{ $recruit_item['reports_to'] }}</span>
                        </div>
                        <dl>
                            <dt>岗位职责：</dt>
                            {!! $recruit_item['duty'] !!}
                        </dl>
                        <dl>
                            <dt>任职要求：</dt>
                            {!! $recruit_item['requirement'] !!}
                        </dl>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</div>
