@if ($paginator->hasPages())
    <div class="product-page">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="product-page-prev"><a href="javascript:;">第一页</a></div>
        @else
            <div class="product-page-prev"><a href="{{ $paginator->previousPageUrl() }}">上一页</a></div>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a href="javascript:;" class="active">{{ $element }}</a>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="javascript:;" class="active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="product-page-next"><a href="{{ $paginator->nextPageUrl() }}">下一页</a></div>
        @else
            <div class="product-page-next"><a href="javascript:;">最后一页</a></div>
        @endif
    </div>

@endif

<!--
<div class="product-page">
            <div class="product-page-prev"><a href="">《上一页</a></div>
            <a href="" class="active">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <div class="product-page-next"><a href="">下一页》</a></div>
        </div>
-->
