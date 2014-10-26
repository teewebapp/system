<?php
namespace Tee\System\Tests;

use Symfony\Component\Console\Output\StreamOutput;
use Artisan;

class InitializeTest extends TestCase
{

    public function testModulesLoaded()
    {
        $stream = fopen("php://output", "w");
        Artisan::call('modules:scan', array(), new StreamOutput($stream));
        //$this->assertTrue(\moduleEnabled('admin'));
    }
}