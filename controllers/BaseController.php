<?php

namespace Tee\System\Controllers;


use Controller, View, Config;
use Tee\System\Theme;

class BaseController extends Controller {

	public function __construct() {
        if(Config::get('site.theme'))
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
