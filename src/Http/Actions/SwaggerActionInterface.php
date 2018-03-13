<?php
namespace Chatbox\LaravelSwagger\Http\Actions;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Parameters\Parameter;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\RequestBody;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Response;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\SecuritySchema;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/10
 * Time: 2:37
 */
interface SwaggerActionInterface {

	const METHOD_GET = "get";
	const METHOD_POST = "post";
	const METHOD_PUT = "put";
	const METHOD_PATCH = "patch";
	const METHOD_DELETE = "delete";

	public function path(): string;

	public function method(): string;

	public function summary(): ?string;

	public function description(): ?string;

	public function operationId(): ?string;

	public function tags(): array;

	/**
	 * @return Parameter[]
	 */
	public function parameters(): array;

	public function requestBodySchema(): ?Schema;

	public function requestBody(): ?RequestBody;

	/** @return Response[] */
	public function responses(): array;

	public function security(): array;

}