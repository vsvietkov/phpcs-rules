<?php

namespace PHP_CodeSniffer\Standards\Vsvietkov\PhpcsRules\Tests\Methods;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;
use PHP_CodeSniffer\Tests\Standards\AllSniffs;

class FunctionTopContentUnitTest extends AbstractSniffUnitTest
{
    protected function setUp()
    {
        parent::setUp();
        $this->testsDir = getcwd() . (isset($_SERVER['PHPSTORM']) ? '/../' : '/src/Tests/');
        $this->standardsDir = getcwd() . (isset($_SERVER['PHPSTORM']) ? '/../../' : '/src/');
        AllSniffs::suite(); // Workaround for tests to set required variables
    }

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
