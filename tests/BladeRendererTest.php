<?php

namespace Enflow\TwigBladeLoader\Test;

use Enflow\TwigBladeLoader\BladeRenderer;

class BladeRendererTest extends TestCase
{
    public function test_it_rendered_the_input()
    {
        $this->assertEquals('Blade file! With variable 123', app(BladeRenderer::class)->render('Blade file! With variable {{ $x }}', [
            'x' => '123',
        ]));
    }
}
