<?php

namespace Enflow\TwigBladeLoader;

use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

class BladeTokenParser extends AbstractTokenParser
{
    public function parse(Token $token): BladeNode
    {
        $stream = $this->parser->getStream();

        $variables = null;
        if ($stream->nextIf(/* Token::NAME_TYPE */ 5, 'with')) {
            $variables = $this->parser->getExpressionParser()->parseExpression();
        }

        $this->parser->getStream()->expect(Token::BLOCK_END_TYPE);

        $body = $this->parser->subparse([$this, 'decideBlockEnd'], true);

        $this->parser->getStream()->expect(Token::BLOCK_END_TYPE);

        return new BladeNode($body, $variables, $token->getLine(), $this->getTag());
    }

    public function decideBlockEnd(Token $token)
    {
        return $token->test('endblade');
    }

    public function getTag(): string
    {
        return 'blade';
    }
}
