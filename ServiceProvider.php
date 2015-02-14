<?php

namespace Tee\System;

use App;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

    public function register()
    {
        $this->app->singleton('tee.siteIdentifier', function() {
            return new SiteIdentifier();
        });

        // registra os macros e helpers
        require_once __DIR__.'/macros/html.php';
        require_once __DIR__.'/macros/form.php';

        App::register('YAAP\Theme\ThemeServiceProvider');
        App::register('Lavary\Menu\ServiceProvider');
        App::register('Creitive\Breadcrumbs\BreadcrumbsServiceProvider');
        App::register('Roumen\Asset\AssetServiceProvider');
        App::register('Pingpong\Widget\WidgetServiceProvider');

        class_alias('Pingpong\\Widget\\Facades\\Widget', 'Tee\\System\\Widget');
        class_alias('YAAP\\Theme\\Facades\\Theme', 'Tee\\System\\Theme');
        class_alias('Lavary\\Menu\\Facade', 'Tee\\System\\Menu');
        class_alias('Creitive\\Breadcrumbs\\Facades\\Breadcrumbs', 'Tee\\System\\Breadcrumbs');
        class_alias('Roumen\\Asset\\Asset', 'Tee\\System\\Asset');
        class_alias('Tee\\System\\Facades\\SiteIdentifier', 'SiteIdentifier');

        // registra os widgets
        Widget::register(
            'errorList',
            __NAMESPACE__.'\\Widgets\\ErrorList'
        );
    }
}
