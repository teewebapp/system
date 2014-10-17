<?php

namespace Tee\System\Controllers;

use Controller, View, Theme, Config;

class BaseController extends Controller {

	public function __construct() {
		Theme::init(Config::get('site.theme'));
        $app = app();
        $viewFinder = $app['view.finder'];
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
