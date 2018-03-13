<?php
namespace Chatbox\LaravelSwagger\Http\Actions;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/10
 * Time: 2:37
 */
class SwaggerDocAction
{
    public function __invoke()
    {
        return view("swagger.swagger");
    }
}
