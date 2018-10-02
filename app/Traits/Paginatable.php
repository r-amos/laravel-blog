<?php

namespace App\Traits;

use Illuminate\Pagination\Paginator;

/**
 * Paginatable Trait
 * 
 * Trait to be used within Models where Paginagtion is required. Adds functionality
 * to calculate the models required to be displayed for a page as well as the
 * startin point.
 * 
 */

trait Paginatable
{

    public static function getPageItems($items)
    {
        $paginationStart = self::getPaginationStart(Paginator::resolveCurrentPage());
        $pageItems = array_slice($items,
            $paginationStart,
            self::PAGE_LIMIT
        );
        $models = array_map(function ($element) {
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
