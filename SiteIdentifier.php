<?php

namespace Tee\System;
use Tee\System\Models\Site;

class SiteIdentifier
{
    public $_current;
    public function current()
    {
        if($this->_current)
            return $this->_current;
        return $this->_current = Site::first();
    }
}