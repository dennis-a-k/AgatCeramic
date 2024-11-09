<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SortableProducts
{
    protected function applySorting(Builder $query, ?string $sort = null): Builder
    {
        switch ($sort) {
            case 'alphabet':
                $query->orderBy('title', 'asc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        return $query;
    }
}
