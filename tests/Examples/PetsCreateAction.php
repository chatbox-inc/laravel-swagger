<?php
namespace Chatbox\LaravelSwagger\Test\Example;
use Chatbox\LaravelSwagger\Http\Actions\SwaggerAction;
use Chatbox\LaravelSwagger\Test\Examples\Schema\ErrorSchema;
use Chatbox\LaravelSwagger\Test\Examples\Schema\PetSchema;
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
class PetsCreateAction extends SwaggerAction {

	protected $path = "/pets";

	protected $method = SwaggerAction::METHOD_POST;

	protected $summary = "Create a pet";

	protected $operationId = "createPets";

	protected $tags = ["pets"];

	public function __invoke() {
		return \Illuminate\Http\Response::create([
			"id" => 12,
			"name" => "/dev/piyo"
		],201);
	}

	public function parameters(): array {
		return [];
	}

	public function responses(): array {
		return [
			"201" => new Response([
				"description" => "Null response",
			]),
			"default" => new Response([
				"description" => "unexpected error",
				"schema" => new ErrorSchema()
			]),
		];
	}
}