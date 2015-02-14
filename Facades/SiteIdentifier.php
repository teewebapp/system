<?php

namespace Tee\System\Facades;

use Illuminate\Support\Facades\Facade;

class SiteIdentifier extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tee.siteIdentifier';
    }
}