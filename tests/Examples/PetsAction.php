<?php
namespace Chatbox\LaravelSwagger\Test\Example;

use Chatbox\LaravelSwagger\Http\Actions\SwaggerAction;
use Chatbox\LaravelSwagger\Test\Examples\Schema\ErrorSchema;
use Chatbox\LaravelSwagger\Test\Examples\Schema\PetSchema;
use Chatbox\LaravelSwagger\Test\Examples\Schema\PetsSchema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\RequestBody;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\SecuritySchema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\MediaType;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Parameters\QueryParameter;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Response;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Schema\IntegerSchema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Schema\StringSchema;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/master/examples/v3.0/petstore.yaml
 */
class PetsAction extends SwaggerAction
{
    protected $path = "/pets";

    protected $method = SwaggerAction::METHOD_GET;

    protected $summary = "List all pets";

    protected $operationId = "listPets";

    protected $tags = ["pets"];

    public function __invoke()
    {
        return [
            [
                "id" => 12,
                "name" => "/dev/piyo"
            ],
            [
                "id" => 12,
                "name" => "/dev/piyo"
            ],
            [
                "id" => 12,
                "name" => "/dev/piyo"
            ],
        ];
    }

    public function parameters(): array
    {
        return [
            new QueryParameter([
                "name" => "limit",
                "schema" => new IntegerSchema(),
                "required" => false,
                "description" => "How many items to return at one time (max 100)"
            ])
        ];
    }

    public function responses(): array
    {
        return [
            "200" => new Response([
                "description" => "An paged array of pets",
                "headers" => [
                    "x-next" => [
                        "description" => "A link to the next page of responses",
                        "schema" => new StringSchema()
                    ]
                ],
                "schema" => new PetsSchema()
            ]),
            "default" => new Response([
                "description" => "unexpected error",
                "schema" => new ErrorSchema()
            ]),
        ];
    }
}
