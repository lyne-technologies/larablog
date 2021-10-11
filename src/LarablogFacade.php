<?php

namespace LyneTechnologies\Larablog;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LyneTechnologies\Larablog\Larablog
 */
class LarablogFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'larablog';
    }
}
