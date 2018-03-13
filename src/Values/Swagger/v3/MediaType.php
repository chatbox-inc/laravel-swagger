<?php
namespace Chatbox\LaravelSwagger\Values\Swagger\v3;

use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/10
 * Time: 2:34
 */
class MediaType implements \Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\MediaType
{
    use PropAssign;

    public $mime = "application/json";

    public $schema;

    /** @var array */
    public $examples = [];

    public function mime()
    {
        return $this->mime;
    }

    public function schema(): ?Schema
    {
        return $this->schema;
    }

    public function examples(): array
    {
        return $this->examples;
    }
}
