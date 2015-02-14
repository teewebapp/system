<?php

namespace Tee\System;
use Tee\System\Models\Site;

class SiteIdentifier
{
    public function current()
    {
        return Site::first();
    }
}