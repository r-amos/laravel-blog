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
        $models = array_map(function($element){
            return new self($element);
        }, $pageItems);
        return (new Paginator($models, self::PAGE_LIMIT))
            ->hasMorePagesWhen($paginationStart < count($items) - self::PAGE_LIMIT);
    }

    private static function getPaginationStart($currentPage)
    {
        return (self::PAGE_LIMIT * $currentPage) - self::PAGE_LIMIT;
    }

}









