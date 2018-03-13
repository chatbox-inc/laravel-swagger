<?php
namespace Chatbox\LaravelSwagger\Http\Actions;

use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\RequestBody;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\SecuritySchema;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/10
 * Time: 2:37
 */
abstract class SwaggerAction implements SwaggerActionInterface
{
    protected $path = "/";

    protected $method = SwaggerAction::METHOD_GET;

    protected $summary = null;

    protected $description = null;

    protected $operationId = null;

    protected $tags = [];

    public function path(): string
    {
        return $this->path;
    }

    public function method(): string
    {
        return $this->method;
    }

    public function summary(): ?string
    {
        return $this->summary;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function operationId(): ?string
    {
        return $this->operationId;
    }

    public function tags(): array
    {
        return $this->tags;
    }

    public function parameters(): array
    {
        return [];
    }

    public function requestBodySchema(): ?Schema
    {
        return null;
    }

    public function requestBody(): ?RequestBody
    {
        return null;
    }

    public function responses(): array
    {
        return [];
    }

    public function security(): array
    {
        return [];
    }
}
