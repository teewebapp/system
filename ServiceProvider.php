<?php

namespace Tee\System;

use Tee\System\Widgets\MainMenu;
use Widget;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

    public function register()
    {
        // registra os macros e helpers
        require_once __DIR__.'/macros/html.php';
        require_once __DIR__.'/macros/form.php';

        // registra os widgets
        Widget::register(
            'mainMenu',
            __NAMESPACE__.'\\Widgets\\MainMenu'
        );

        Widget::register(
            'errorList',
            __NAMESPACE__.'\\Widgets\\ErrorList'
        );
    }
}