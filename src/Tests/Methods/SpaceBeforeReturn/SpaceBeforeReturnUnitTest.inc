<?php

function test1(): void
{
    $someVariable = null;

    return;

    // Test comment

    return;
}

function test2(): void
{
    if (true) {
        $test = null;
    }

    return;
}

function test3(): void
{
    if (true) {
        $test1 = null;
        $test2 = null;
        $test3 = null;

        return;
    }
}

function test4(): void
{
    if (true) {
        $test1 = null;
        $test2 = null;
        $test3 = null;
        $test4 = null;
        return;
    }
}
