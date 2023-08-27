<?php

namespace Vsvietkov\PhpcsRules\Tests;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;
use PHP_CodeSniffer\Tests\Standards\AllSniffs;

abstract class BaseSniffTest extends AbstractSniffUnitTest
{
    protected function setUp(): void
    {
        parent::setUp();

        $path = isset($_SERVER['PHPSTORM']) ? '/opt/project/' : '/phpcs-rules/';
        $this->testsDir = $path . 'src/Tests/';
        $this->standardsDir = $path . 'src/';
        AllSniffs::suite(); // Workaround for tests to set required variables
    }
}
