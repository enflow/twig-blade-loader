<?php

namespace Enflow\TwigBladeLoader;

use Twig\Compiler;
use Twig\Node\Expression\AbstractExpression;
use Twig\Node\Node;

class BladeNode extends Node
{
    public function __construct(Node $body, ?AbstractExpression $variables, int $lineno, string $tag = null)
    {
        $nodes = ['body' => $body];
        if (null !== $variables) {
            $nodes['variables'] = $variables;
        }

        parent::__construct($nodes, [], $lineno, $tag);
    }

    public function compile(Compiler $compiler): void
    {
        $compiler
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->raw('echo ')
            ->raw('app(\Enflow\TwigBladeLoader\BladeRenderer::class)->render(')
            ->raw('ob_get_clean()')
            ->raw(',');

        $this->addVariables($compiler);

        $compiler->raw(')')
            ->raw(";\n");
    }

    private function addVariables(Compiler $compiler): void
    {
        if (! $this->hasNode('variables')) {
            $compiler->raw('$context');
        } else {
            $compiler
                ->raw('twig_array_merge($context, ')
                ->subcompile($this->getNode('variables'))
                ->raw(')');
        }
    }
}
