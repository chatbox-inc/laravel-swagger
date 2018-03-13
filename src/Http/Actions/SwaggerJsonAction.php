<?php
namespace Chatbox\LaravelSwagger\Http\Actions;

use Chatbox\LaravelSwagger\Service\SwaggerGenerator;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/10
 * Time: 2:37
 */
class SwaggerJsonAction
{
    public function __invoke(SwaggerGenerator $generator)
    {
        return $generator->generate();
    }
}
