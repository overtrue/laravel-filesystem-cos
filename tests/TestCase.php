<?php

namespace Overtrue\LaravelFilesystem\Cos\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Overtrue\LaravelFilesystem\Cos\CosStorageServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [CosStorageServiceProvider::class];
    }
}
