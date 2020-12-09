<?php

namespace Enflow\TwigBladeLoader;

use Illuminate\Support\ServiceProvider;

class TwigBladeLoaderServiceProvider extends ServiceProvider
{
    public function register()
    {
         $this->app->afterResolving('twig', fn () => $this->app['twig']->addExtension(new TwigBladeLoaderExtension()));
    }

    public function boot()
    {
        $this->app->singleton(BladeRenderer::class);
    }
}
