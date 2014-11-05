<?php

namespace Tee\System\Tests;

use Creolab\LaravelModules\Module;

class TestCase extends \Illuminate\Foundation\Testing\TestCase {

	public $app;
	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		if(!$this->app)
		{
			$unitTesting = true;

			$testEnvironment = 'testing';

			$app = require __DIR__.'/bootstrap/start.php';

			$this->app = $app;
		}
		return $this->app;
	}

	public function setUp() {
		parent::setUp();
		$app = $this->createApplication();
		
		$vendorDir = base_path() . '/vendor';
		if(!file_exists($vendorDir.'/teewebapp')) {
		    mkdir($vendorDir.'/teewebapp');
		}

		$modulePath = getcwd();
		$moduleName = basename($modulePath);

		$modules = $app['modules']->modules();

		$module = new Module($moduleName, $modulePath, null, $app, '.');
		$module->register();
		$modules[$moduleName] = $module;
		
	}

}