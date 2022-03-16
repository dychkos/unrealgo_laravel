
@if ($paginator->hasPages())

    <ul class="pages-navigator">
        @if ($paginator->onFirstPage())

            <li class="pages-navigator__item pages-navigator__item_first disabled">
                <span>
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#191a29" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg>
                </span>
            </li>

        @else

            <li>
                <a class="pages-navigator__item pages-navigator__item_first"
                   href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#191a29" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg>
                </a>
            </li>

        @endif
        @foreach ($elements as $element)
            @if (is_string($element))

                <li class="pages-navigator__item disabled"><span>{{ $element }}</span></li>

            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())

                        <li class="pages-navigator__item pages-navigator__item_active"><span>{{ $page }}</span></li>

                    @else

                        <li class="pages-navigator__item"><a class="pages-navigator__item" href="{{ $url }}">{{ $page }}</a></li>

                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())

            <li>
                <a class="pages-navigator__item" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#191a29" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                </a>
            </li>

        @else

            <li class="pages-navigator__item disabled">
                <span>
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#191a29" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                </span>
            </li>

        @endif
    </ul>


@endif
