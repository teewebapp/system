<?php

namespace Tee\System\Models;

use Eloquent, URL;

class Model extends Eloquent {

    public function __construct(array $attributes = array())
    {
        if(isset($this->defaults))
            $this->setRawAttributes($this->defaults, true);
        parent::__construct($attributes);
    }

}