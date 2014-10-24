<?php

namespace Tee\System;

use Tee\System\Widgets\MainMenu;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

    public function register()
    {
        // registra os macros e helpers
        require_once __DIR__.'/macros/html.php';
        require_once __DIR__.'/macros/form.php';

        class_alias('Pingpong\\Widget\\Facades\\Widget', 'Tee\\System\\Widget');
        class_alias('YAAP\\Theme\\Facades\\Theme', 'Tee\\System\\Theme');
        class_alias('Lavary\\Menu\\Facade', 'Tee\\System\\Menu');
        class_alias('Creitive\\Breadcrumbs\\Facades\\Breadcrumbs', 'Tee\\System\\Breadcrumbs');
        class_alias('Roumen\\Asset\\Asset', 'Tee\\System\\Asset');

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