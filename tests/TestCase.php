<?php

namespace Enflow\TwigBladeLoader\Test;

use Enflow\TwigBladeLoader\TwigBladeLoaderServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use TwigBridge\ServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class,
            TwigBladeLoaderServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('view.paths', [
            __DIR__.'/views',
            resource_path('views'),
        ]);
    }
}
