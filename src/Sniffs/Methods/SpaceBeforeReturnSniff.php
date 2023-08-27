<?php

namespace PHP_CodeSniffer\Standards\Vsvietkov\PhpcsRules\Sniffs\Methods;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use Vsvietkov\PhpcsRules\Traits\Fixable\NoSpaceBeforeToken;
use Vsvietkov\PhpcsRules\Traits\Fixable\SpaceBeforeToken;

class SpaceBeforeReturnSniff implements Sniff
{
    use SpaceBeforeToken;
    use NoSpaceBeforeToken;

    private const LINE_NUMBER = 3;

    public function register(): array
    {
        return [T_RETURN];
    }

    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();
        $prevToken = $phpcsFile->findPrevious(T_WHITESPACE, $stackPtr - 1, null, true);
        $prevOpenCurlyBracket = $phpcsFile->findPrevious(T_OPEN_CURLY_BRACKET, $stackPtr - 1);

        if ($tokens[$prevToken]['line'] + 1 === $tokens[$stackPtr]['line']) {
            if (
                !in_array($tokens[$prevToken]['code'], [
                    T_OPEN_CURLY_BRACKET, // Will be handled by another rule
                    T_COMMENT, // Treat comment like an empty line
                    T_COLON, // Conflicts with another rule
                    T_CLOSE_CURLY_BRACKET,
                ])
                && $tokens[$prevToken]['line'] - $tokens[$prevOpenCurlyBracket]['line'] > self::LINE_NUMBER
            ) {
                $this->addFixableErrorNoSpaceBeforeToken($phpcsFile, $stackPtr);
            }
        } elseif (
            $tokens[$prevToken]['code'] === T_COMMENT // There should be no space after comments
            || (
                $tokens[$prevToken]['code'] !== T_OPEN_CURLY_BRACKET // The error will be handled by another rule
                && $tokens[$prevToken]['line'] - $tokens[$prevOpenCurlyBracket]['line'] <= self::LINE_NUMBER
            )
        ) {
            $this->addFixableErrorSpaceBeforeToken($phpcsFile, $stackPtr);
        }
    }
}
