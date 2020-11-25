<?php

namespace Enflow\TwigBladeLoader;

use Twig\Extension\AbstractExtension;

class TwigBladeLoaderExtension extends AbstractExtension
{
    public function getTokenParsers()
    {
        return [
            new BladeTokenParser(),
        ];
    }
}
