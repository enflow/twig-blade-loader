<?php

namespace Enflow\TwigBladeLoader;

use Illuminate\Support\ServiceProvider;

class TwigBladeLoaderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(BladeRenderer::class);

        $this->app->afterResolving('twig', fn () => $this->app['twig']->addExtension(new TwigBladeLoaderExtension()));
    }
}
