<?php
namespace Chatbox\LaravelSwagger\Http;

use Chatbox\LaravelSwagger\Facade\Swagger;
use Chatbox\LaravelSwagger\Http\Actions\SwaggerDocAction;
use Chatbox\LaravelSwagger\Http\Actions\SwaggerJsonAction;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/12
 * Time: 15:01
 */
class Router
{
    public static function api_route($router)
    {
        foreach (Swagger::getActions() as $action) {
            $router->{$action->method()}($action->path(), get_class($action));
        }
    }

    public static function swagger_ui($router)
    {
        $router->get("/", SwaggerDocAction::class);
        $router->get("/definitions", SwaggerJsonAction::class);
    }
}
