<?php
namespace Chatbox\LaravelSwagger\Test;

use Laravel\Lumen\Testing\TestCase as BaseTest;

abstract class TestCase extends BaseTest
{


    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/bootstrap.php';
    }
}
