<?php

namespace App\Traits;

use Illuminate\Pagination\Paginator;

trait Paginatable {

    public static function getPageItems($items)
    {
        $paginationStart = self::getPaginationStart(Paginator::resolveCurrentPage());
        $pageItems = array_slice($items,
            $paginationStart,
            self::PAGE_LIMIT
        );
        return (new Paginator($pageItems, self::PAGE_LIMIT))
            ->hasMorePagesWhen($paginationStart < count($items) - self::PAGE_LIMIT);
    }

    private static function getPaginationStart($currentPage)
    {
        return (self::PAGE_LIMIT * $currentPage) - self::PAGE_LIMIT;
    }

}









