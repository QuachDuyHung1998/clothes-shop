<div class="text-right pr-1">
    <ul class="pagination mt-2 d-inline-flex">
        {{-- prev page --}}
        @if ($paginator->onFirstPage())
            <li class="page-item prev disabled"><a class="page-link" href="javascript:void(0);"></a></li>
        @else
            <li class="page-item prev"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"></a></li>
        @endif

        {{-- first page --}}
        @if ($paginator->currentPage() == 1)
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="javascript:void(0);">1</a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
        @endif

        @if ($paginator->currentPage() > 4 && $paginator->currentPage() < ($paginator->lastPage() - 3))
            <li class="paginate_button page-item disabled" id="list-category_ellipsis">
                <a href="#" class="page-link">…</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage() - 1) }}">
                    {{ $paginator->currentPage() - 1 }}
                </a>
            </li>
            {{-- current page --}}
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="javascript:void(0);">{{ $paginator->currentPage() }}</a>
            </li>
            {{-- end current page --}}
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}">
                    {{ $paginator->currentPage() + 1 }}
                </a>
            </li>
            <li class="paginate_button page-item disabled" id="list-category_ellipsis">
                <a href="#" class="page-link">…</a>
            </li>
        @else
            @if ($paginator->currentPage() <= 4)
                @for ($i = 2; $i <= 5; $i++)
                    @if ($i == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="javascript:void(0);">{{ $paginator->currentPage() }}</a>
                        </li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor
                <li class="paginate_button page-item disabled" id="list-category_ellipsis">
                    <a href="#" class="page-link">…</a>
                </li>                                
            @elseif ($paginator->currentPage() > ($paginator->lastPage() - 4))
                <li class="paginate_button page-item disabled" id="list-category_ellipsis">
                    <a href="#" class="page-link">…</a>
                </li> 
                @for ($i = $paginator->lastPage() - 4; $i < $paginator->lastPage(); $i++)
                    @if ($i == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="javascript:void(0);">{{ $paginator->currentPage() }}</a>
                        </li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor
            @endif
        @endif

        {{-- last page --}}
        @if ($paginator->currentPage() == $paginator->lastPage())
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="javascript:void(0);">{{ $paginator->lastPage() }}</a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- next page --}}
        @if ($paginator->hasMorePages())
            <li class="page-item next"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"></a></li>
        @else
            <li class="page-item next disabled"><a class="page-link" href="javascript:void(0);"></a></li>
        @endif
    </ul>
</div>