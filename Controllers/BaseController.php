<?php

namespace Tee\System\Controllers;


use Controller, View, Config, URL;
use Tee\System\Theme;
use Tee\System\Breadcrumbs;

class BaseController extends Controller {

	public function __construct() {
        if(Config::get('site.theme'))
		  Theme::init(Config::get('site.theme'));
        $app = app();
        $viewFinder = $app['view.finder'];
        Breadcrumbs::setListElement('ol');
        Breadcrumbs::setCssClasses('breadcrumb');
        Breadcrumbs::addCrumb('Início', URL::to('/'));
        Breadcrumbs::setDivider('');

        View::share('breadcrumbVisible', true);

        foreach($app['modules']->modules() as $name => $module)
        {
            if($module->enabled())
            {
                foreach($viewFinder->getPaths() as $path)
                {
                    $viewFinder->prependNamespace($name, $path.'/modules/'.$name);
                }
            }
        }
	}

}
