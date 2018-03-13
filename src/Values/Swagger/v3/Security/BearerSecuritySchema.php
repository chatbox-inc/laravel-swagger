<?php
namespace Chatbox\LaravelSwagger\Values\Swagger\v3\Security;

use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\SecuritySchema;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/13
 * Time: 16:58
 */
class BearerSecuritySchema implements SecuritySchema
{
    protected $name;

    protected $description;

    public function getName(): string
    {
        return $this->name;
    }

    public function value(): array
    {
        return [
            "type" => "http",
            "scheme" => "bearer",
            "bearerFormat" => $this->description
        ];
    }
}
