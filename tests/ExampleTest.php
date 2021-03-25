<?php

namespace Shinsenter\DeferLaravel\Tests;

use Orchestra\Testbench\TestCase;
use Shinsenter\DeferLaravel\DeferLaravelServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [DeferLaravelServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
