<?php

namespace Vsvietkov\PhpcsRules\Traits\Fixable;

use Vsvietkov\PhpcsRules\ErrorCodesEnum;

trait NoSpaceBeforeToken
{
    public function addFixableErrorNoSpaceBeforeToken(
        \PHP_CodeSniffer\Files\File $phpcsFile,
        int $tokenToRaiseError,
        string $errorMessage = '',
        array $errorMessageArguments = []
    ): void {
        if (empty($errorMessage)) {
            $errorMessage = 'No space before token.';
        }
        $fix = $phpcsFile->addFixableError(
            $errorMessage,
            $tokenToRaiseError,
            ErrorCodesEnum::NO_SPACE_BEFORE,
            $errorMessageArguments,
        );

        if ($fix) {
            $phpcsFile->fixer->beginChangeset();
            $phpcsFile->fixer->addNewlineBefore($tokenToRaiseError);
            $phpcsFile->fixer->endChangeset();
        }
    }
}
