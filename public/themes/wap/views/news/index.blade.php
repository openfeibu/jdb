
<header>
    <div class="return" onclick="window.history.go(-1)"></div>
    <p>资讯</p>
    <div class="menu"></div>
</header>
{!! Theme::widget('nav')->render() !!}

<div class="main">
    <div class="pbanner"><img src="{!! theme_asset("images/new.jpg") !!}" alt=""></div>
    <div class="new">

        <div class="new-con">
            @foreach($news_list as $key=> $news)
                <div class="new-item " >
                    <a href="{{ route('wap.news.show',['id' => $news['id']]) }}">
                        <div class="test">
                            <div class="t">{{ $news['title'] }}</div>
                            <div class="d">{{ format_date($news['created_at'],'Y-m-d') }} </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        {!! $news_list->links('common.pagination') !!}

    </div>
</div>


<script>
    $(function(){
        var caseTab= new Swiper('.swiper-container-caseTab', {

            spaceBetween: 10,
            slidesPerView :'5.2' ,
            slidesOffsetAfter : 30,
        });
    })
</script>
