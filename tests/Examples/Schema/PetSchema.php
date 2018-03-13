<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/11
 * Time: 15:22
 */

namespace Chatbox\LaravelSwagger\Test\Examples\Schema;

use Chatbox\LaravelSwagger\Values\Swagger\v3\Schema;

class PetSchema extends Schema
{
    public $refname = "Pet";

    public function value(): array
    {
        return [
            "required" => ["id","name"],
            "properties" => [
                "id" => [
                    "type" => "integer",
                    "format" => "int64",
                ],
                "name" => new Schema\StringSchema(),
                "tag" => new Schema\StringSchema(),
            ]
        ];
    }
}
