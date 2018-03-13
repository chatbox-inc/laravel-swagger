<?php
namespace Chatbox\LaravelSwagger\Test\Example;
use Chatbox\LaravelSwagger\Http\Actions\SwaggerAction;
use Chatbox\LaravelSwagger\Test\Examples\Schema\ErrorSchema;
use Chatbox\LaravelSwagger\Test\Examples\Schema\PetSchema;
use Chatbox\LaravelSwagger\Test\Examples\Schema\PetsSchema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\RequestBody;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\SecuritySchema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\MediaType;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Parameters\PathParameter;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Parameters\QueryParameter;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Response;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Schema\IntegerSchema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Schema\StringSchema;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/master/examples/v3.0/petstore.yaml
 */
class PetAction extends SwaggerAction {

	protected $path = "/pets/{petId}";

	protected $method = SwaggerAction::METHOD_GET;

	protected $summary = "Info for a specific pet";

	protected $operationId = "showPetById";

	protected $tags = ["pets"];

	public function __invoke() {
		return [
			[
			"id" => 12,
			"name" => "/piyo"
				]
		];
	}

	public function parameters(): array {
		return [
			new PathParameter([
				"name" => "petId",
				"description" => "The id of the pet to retrieve"
			])
		];
	}

	public function responses(): array {
		return [
			"200" => new Response([
				"description" => "Expected response to a valid request",
				"schema" => new PetsSchema()
			]),
			"default" => new Response([
				"description" => "unexpected error",
				"schema" => new ErrorSchema()
			]),
		];
	}

}