<div class="pagination pagination__container">
    @if ($paginator->previousPageUrl())
        <a class="pagination__link" href={{ $paginator->previousPageUrl() }}>Previous Page</a>
    @endif
    @if ( $paginator->nextPageUrl())
        <a class="pagination__link" href={{ $paginator->nextPageUrl() }}>Next Page</a>
    @endif
</div>