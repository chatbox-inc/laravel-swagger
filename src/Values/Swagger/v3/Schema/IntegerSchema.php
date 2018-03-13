<?php
namespace Chatbox\LaravelSwagger\Values\Swagger\v3\Schema;

use Chatbox\LaravelSwagger\Values\Swagger\v3\Schema;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/10
 * Time: 2:34
 */
class IntegerSchema extends Schema
{
    public $value = ["type"=>"integer","format" => "int32"];
}
