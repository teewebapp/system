<?php

namespace Tee\System\Models;

use Eloquent, URL, Validator;

class Model extends Eloquent {

    public $_validatorRequired;

    public function __construct(array $attributes = array())
    {
        if(isset($this->defaults))
            $this->setRawAttributes($this->defaults, true);
        parent::__construct($attributes);
    }

    public function getValidator($data, $scope)
    {
        return Validator::make($data, static::$rules);
    }

    public function isRequiredAttribute($attribute)
    {
        if(!$this->_validatorRequired)
            $this->_validatorRequired = $this->getValidator(array(), 'create');
        $rules = $this->_validatorRequired->getRules();
        if(!array_key_exists($attribute, $rules))
            return false;
        if(in_array('required', $rules[$attribute]))
            return true;
        return false;
    }

}