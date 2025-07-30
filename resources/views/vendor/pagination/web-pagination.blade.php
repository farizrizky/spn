@if ($paginator->hasPages())
    <div class="blog-patination text-center mt-50">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="#"><span class="icon disabled"><i class="ri-arrow-left-double-line"></i></span></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"><span class="icon"><i class="ri-arrow-left-double-line"></i></span></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a href="#"><span>{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="active"><span>{{ $page }}</span></a>
                    @else
                        <a href="{{ $url }}"><span>{{ $page }}</span></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"><span class="icon"><i class="ri-arrow-right-double-line"></i></span></a>
        @else
            <a href="#"><span class="icon disabled"><i class="ri-arrow-right-double-line"></i></span></a>
        @endif
    </div>
@endif
