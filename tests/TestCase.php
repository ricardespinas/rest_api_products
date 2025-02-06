<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function testEnvironmentIsCorrect()
    {
        $this->assertEquals(env('TESTING_ENV'), 'true');
    }
}
