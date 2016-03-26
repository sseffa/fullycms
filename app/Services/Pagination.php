<?php

namespace Fully\Services;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Pagination
{
    /**
     * Paginator
     *
     * @param $data
     * @param $total
     * @param $perPage
     *
     * @return LengthAwarePaginator
     */
    public static function makeLengthAware($data, $total, $perPage)
    {
        return new LengthAwarePaginator($data, $total, $perPage, Paginator::resolveCurrentPage(), [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }
}
