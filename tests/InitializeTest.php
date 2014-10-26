<?php
namespace Tee\System\Tests;

class InitializeTest extends TestCase
{

    public function testModulesLoaded()
    {
        $this->assertTrue(\moduleEnabled('system'));
    }
}