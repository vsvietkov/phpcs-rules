<?php

namespace Vsvietkov\PhpcsRules\Traits\Fixable;

use Vsvietkov\PhpcsRules\ErrorCodesEnum;

trait SpaceBeforeToken
{
    public function addFixableErrorSpaceBeforeToken(
        \PHP_CodeSniffer\Files\File $phpcsFile,
        int $tokenToRaiseError,
        string $errorMessage = '',
        array $errorMessageArguments = []
    ): void {
        if (empty($errorMessage)) {
            $errorMessage = 'There should be no space before token.';
        }
        $fix = $phpcsFile->addFixableError(
            $errorMessage,
            $tokenToRaiseError,
            ErrorCodesEnum::SPACE_BEFORE,
            $errorMessageArguments,
        );

        if ($fix) {
            $prevToken = $phpcsFile->findPrevious(T_WHITESPACE, $tokenToRaiseError - 1, null, true);
            $phpcsFile->fixer->beginChangeset();

            for ($i = $tokenToRaiseError; $i > $prevToken; --$i) {
                $phpcsFile->fixer->replaceToken($tokenToRaiseError - 2, '');
            }
            $phpcsFile->fixer->endChangeset();
        }
    }
}
