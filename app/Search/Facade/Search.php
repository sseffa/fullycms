<?php

namespace Fully\Search\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class Search.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class Search extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'search';
    }
}
