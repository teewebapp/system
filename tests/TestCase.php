<?php

namespace Tee\System\Tests;

class TestCase extends \Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		$app = require __DIR__.'/bootstrap/start.php';

		$vendorDir = base_path() . '/vendor';
		if(!file_exists($vendorDir.'/teewebapp')) {
		    mkdir($vendorDir.'/teewebapp');
		}

		$modulePath = getcwd();
		$moduleName = basename($modulePath);

		return $app;
	}

}
