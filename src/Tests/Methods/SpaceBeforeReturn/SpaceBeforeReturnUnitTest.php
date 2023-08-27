<?php

namespace PHP_CodeSniffer\Standards\Vsvietkov\PhpcsRules\Tests\Methods;

use Vsvietkov\PhpcsRules\Tests\BaseSniffTest;

class SpaceBeforeReturnUnitTest extends BaseSniffTest
{
    protected function getErrorList(): array
    {
        return [
            7 => 1,
            11 => 1,
            20 => 1,
            30 => 1,
            41 => 1,
        ];
    }

    protected function getWarningList(): array
    {
        return [];
    }
}
