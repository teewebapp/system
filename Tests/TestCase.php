<?php

namespace Tee\System\Tests;

use Creolab\LaravelModules\Module;

use Artisan, File;


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
			$app->boot();

			Artisan::call('modules:migrate');
			Artisan::call('modules:seed');
			$this->app = $app;
		}
		return $this->app;
	}

	public function setUp()
	{
		parent::setUp();
		$app = $this->createApplication();
		$this->resetEvents();
	}

	private function resetEvents()
	{
		// Get all models in the Model directory
		foreach($this->app['modules']->modules() as $module)
		{
		    $pathToModels = $module->path().'/Models';   // <- Change this to your model directory
		    $files = File::files($pathToModels);

		    // Remove the directory name and the .php from the filename
		    $files = str_replace($pathToModels.'/', '', $files);
		    $files = str_replace('.php', '', $files);

		    // Reset each model event listeners.
		    foreach ($files as $model)
		    {
		    	if($module->name() == 'system' && $model == 'Model')
		    		continue;

		    	$className = 'Tee\\'.ucfirst($module->name()).'\\Models\\'.$model;

		        // Flush any existing listeners.
		        call_user_func(array($className, 'flushEventListeners'));

		        // Reregister them.
		        call_user_func(array($className, 'boot'));
		    }

		}
	}
}
