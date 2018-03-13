<?php
namespace Chatbox\LaravelSwagger\Facade;

use Illuminate\Support\Facades\Facade;

use Chatbox\LaravelSwagger\Http\Actions\SwaggerActionInterface;

/**
 * @method static void addAction(\Chatbox\LaravelSwagger\Http\Actions\SwaggerActionInterface|string $action)
 * @method static array getActions()
 * @method static void route( $router )
 */
class Swagger extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'swagger';
    }
}
