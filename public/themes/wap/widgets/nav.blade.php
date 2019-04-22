<div class="nav">
    <div class="nav-header">
        <div class="logo"><a href=""><img src="{!! logo() !!}" alt=""></a></div>
        <div class="close"></div>
    </div>
    <div class="nav-list">
        @foreach($navs as $key => $item)
            <div class="nav-item {{ active_class($item->active) }}">
                <a href="{{ $item->url }}">{{ $item->name }}</a>
            </div>
        @endforeach
    </div>
</div>