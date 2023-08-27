<?php

namespace PHP_CodeSniffer\Standards\Vsvietkov\PhpcsRules\Tests\Methods;

use Vsvietkov\PhpcsRules\Tests\BaseSniffTest;

class FunctionTopContentUnitTest extends BaseSniffTest
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
