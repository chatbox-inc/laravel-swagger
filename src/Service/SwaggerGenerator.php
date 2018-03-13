<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/02/16
 * Time: 19:08
 */

namespace Chatbox\LaravelSwagger\Service;


//use Chatbox\LaravelSwagger\Values\Route;

use Chatbox\LaravelSwagger\Http\Actions\SwaggerActionInterface;
use Chatbox\LaravelSwagger\Swagger;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Response;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\SecuritySchema;

class SwaggerGenerator {

	protected $swagger;

	public function __construct(Swagger $swagger ) {
		$this->swagger = $swagger;
	}


	public function generate():array{
		$pathItems = [];
		$actions = $this->swagger->getActions();
		foreach ( $actions as $action ) {
			$key = $action->path().".".$action->method();
			array_set($pathItems,$key,$this->convertActionToOperation($action));
		}

		$doc = array_merge(config()->get("swagger.document"),[
			"paths" => $pathItems
		]);

		$schemas = $this->setUpGlobalSchemas($this->swagger->getSchemas());
		if($schemas){
			array_set($doc,"components.schemas",$schemas);
		}

		$schemas = $this->setUpGlobalSecuritySchemas($this->swagger->getSecurity());
		if($schemas){
			array_set($doc,"components.securitySchemes",$schemas);
		}

		$doc = json_decode((string)json_encode($doc)?:"{}",true);
		return $doc;

	}

	protected function convertActionToOperation(SwaggerActionInterface $action){
		$operation = [
			"responses" => $action->responses(),
 		];

		($value = $action->summary()) && (!is_null($value)) && $operation["summary"] = $value;
		($value = $action->description()) && (!is_null($value)) && $operation["description"] = $value;
		($value = $action->tags()) && $operation["tags"] = $value;
		($value = $action->operationId()) && (!is_null($value)) && $operation["operationId"] = $value;
		if($parameters = $action->parameters()){
			$operation["parameters"] = $action->parameters();
		}
		if($parameters = $action->parameters()){
			$operation["parameters"] = $action->parameters();
		}
		if($security = $action->security()){
			$operation["security"] = $action->security();
		}
		if($parameters = $action->requestBody()){
			$operation["requestBody"] = $action->requestBody();
		}
		return $operation;
	}

	protected function setUpGlobalSchemas(array $schemas){
		$doc = [];
		foreach ( $schemas as $schema ) {
			assert($schema instanceof Schema);
			$doc[$schema->refname()] = $schema->setAnonymous();
		}
		return $doc;
	}

	protected function setUpGlobalSecuritySchemas(array $schemas){
		$doc = [];
		foreach ( $schemas as $schema ) {
			assert($schema instanceof SecuritySchema);
			$doc[$schema->getName()] = $schema->value();
		}
		return $doc;
	}


}