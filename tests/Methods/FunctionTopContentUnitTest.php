<?php

namespace Vsvietkov\PhpcsRules\Tests\Methods;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class FunctionTopContentUnitTest extends AbstractSniffUnitTest
{
    protected function getErrorList(): array
    {
        return [
            7 => 1,
        ];
    }

    protected function getWarningList(): array
    {
        return [];
    }
}
