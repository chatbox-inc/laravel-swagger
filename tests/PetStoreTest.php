<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/11
 * Time: 2:11
 */

namespace Chatbox\LaravelSwagger\Test;

use Chatbox\LaravelSwagger\Http\Actions\SwaggerActionInterface;
use Chatbox\LaravelSwagger\Swagger;
use Chatbox\LaravelSwagger\Test\Example\PetAction;
use Chatbox\LaravelSwagger\Test\Example\PetsAction;
use Chatbox\LaravelSwagger\Test\Example\PetsCreateAction;
use Chatbox\LaravelSwagger\Testing\Lumen\Inspector;

class PetStoreTest extends TestCase
{
    protected function swagger():Swagger
    {
        return app(Swagger::class);
    }

    public function testPetsAction()
    {
        $action = app(PetsAction::class);
        assert($action instanceof SwaggerActionInterface);

        $inspector = new Inspector($action);

        $response = $inspector->request([
            "limit" => 0
        ]);

        $inspector->assertResponseStatus(200);
        $inspector->assertWithSchema(200, $response);
    }

    public function testPetAction()
    {
        $action = app(PetAction::class);
        assert($action instanceof SwaggerActionInterface);

        $inspector = new Inspector($action);

        $response = $inspector->request([
            "limit" => 0
        ]);

        $inspector->assertResponseStatus(200);
        $inspector->assertWithSchema(200, $response);
    }

    public function testPetsCreateAction()
    {
        $action = app(PetsCreateAction::class);
        assert($action instanceof SwaggerActionInterface);

        $inspector = new Inspector($action);

        $response = $inspector->request([
            "limit" => 0
        ]);

        $inspector->assertResponseStatus(201);
    }
}
