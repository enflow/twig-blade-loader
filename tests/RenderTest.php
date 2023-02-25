<?php

namespace Enflow\TwigBladeLoader\Test;

class RenderTest extends TestCase
{
    public function test_is_renders_variables_with_global_scope()
    {
        $rendered = view('variable-global-scope', [
            'name' => 'From Global Scope',
        ])->render();

        $this->assertEquals('From Global Scope'."\n", $rendered);
    }

    public function test_it_passed_along_variables_from_with_statement()
    {
        $rendered = view('with-variables')->render();

        $this->assertEquals('variable-1'."\n", $rendered);
    }

    public function test_it_works_with_verbatim()
    {
        $rendered = view('verbatim')->render();

        $this->assertEquals('name-in-verbatim', $rendered);
    }
}
