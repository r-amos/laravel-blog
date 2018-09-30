<div class="pagination pagination__container">
    @if ($paginator->previousPageUrl())
        <a class="pagination__link" href={{ $paginator->previousPageUrl() }}>Newer Rambles.</a>
    @endif
    @if ( $paginator->nextPageUrl())
        <a class="pagination__link" href={{ $paginator->nextPageUrl() }}>Older Rambles.</a>
    @endif
</div>