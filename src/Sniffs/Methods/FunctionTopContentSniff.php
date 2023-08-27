<?php

namespace PHP_CodeSniffer\Standards\Vsvietkov\PhpcsRules\Sniffs\Methods;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use Vsvietkov\PhpcsRules\Traits\Fixable\SpaceBeforeToken;

class FunctionTopContentSniff implements Sniff
{
    use SpaceBeforeToken;

    public function register(): array
    {
        return [T_FUNCTION, T_CLOSURE];
    }

    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();
        $openingBracket = $tokens[$stackPtr]['scope_opener'] ?? null;

        if (is_null($openingBracket)) {
            // No opening brace. As an example, an interface method declaration.
            return;
        }
        $nextToken = $phpcsFile->findNext(T_WHITESPACE, $openingBracket + 1, null, true);

        if ($tokens[$nextToken]['line'] - $tokens[$openingBracket]['line'] <= 1) {
            // There are no blank lines between the { and content.
            return;
        }
        $this->addFixableErrorSpaceBeforeToken(
            $phpcsFile,
            $nextToken,
            'There should be no blank lines on top of the function`s body.'
        );
    }
}
