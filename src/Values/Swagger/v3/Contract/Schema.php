<?php
namespace Chatbox\LaravelSwagger\Values\Swagger\v3\Contract;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/10
 * Time: 2:34
 */
interface Schema
{
    public function refname():?string;

    public function value():array;

    public function setAnonymous():Schema;
}
