<?php

namespace Tee\System\Widgets;

use View, Menu;
use Tee\Page\Models\Page;
use Tee\Page\Models\PageCategory;

class ErrorList {
    public function register($errors)
    {
        return View::make(
            'system::widgets.errors',
            compact('errors')
        );
    }
}