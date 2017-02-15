@if ($paginator->hasPages())
    <div class="pagination">

    {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        @else
            <p><a href="{{ $paginator->url(1) }}"><<</a></p>
            <p><a href="{{ $paginator->previousPageUrl() }}"><</a></p>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}


            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <p id="active">{{ $page }}</p>
                    @else
                        <p><a href="{{ $url }}">{{ $page }}</a></p>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())

            <p><a href="{{ $paginator->nextPageUrl() }}">></a></p>
            <p><a href="{{ $paginator->url($paginator->lastPage()) }}">>></a></p>
        @else
        @endif
    </div>
@endif
