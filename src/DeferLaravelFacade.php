<?php

namespace Shinsenter\DeferLaravel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Shinsenter\DeferLaravel\Skeleton\SkeletonClass
 */
class DeferLaravelFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'defer-laravel';
    }
}
