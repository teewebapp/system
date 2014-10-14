<?php

namespace Tee\System;

use Tee\System\Widgets\MainMenu;
use Widget;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

    public function register()
    {
        // registra os macros e helpers
        require_once app_path().'/modules/system/macros/html.php';
        require_once app_path().'/modules/system/macros/form.php';

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