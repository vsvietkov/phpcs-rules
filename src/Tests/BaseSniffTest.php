<?php

namespace Vsvietkov\PhpcsRules\Tests;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;
use PHP_CodeSniffer\Tests\Standards\AllSniffs;

abstract class BaseSniffTest extends AbstractSniffUnitTest
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->testsDir = (isset($_SERVER['PHPSTORM']) ? '/opt/project/src/Tests/' : '/phpcs-rules/src/Tests/');
        $this->standardsDir = (isset($_SERVER['PHPSTORM']) ? '/opt/project/src/' : '/phpcs-rules/src/');
        AllSniffs::suite(); // Workaround for tests to set required variables
    }
}
