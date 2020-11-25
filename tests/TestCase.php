<?php

namespace Enflow\TwigBladeLoader\Test;

use Enflow\TwigBladeLoader\TwigBladeLoaderServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \TwigBridge\ServiceProvider::class,
            TwigBladeLoaderServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.paths', [
            __DIR__.'/views',
            resource_path('views'),
        ]);
    }
}
