<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/11
 * Time: 18:00
 */

namespace Chatbox\LaravelSwagger\Testing;


use Chatbox\LaravelSwagger\Http\Actions\SwaggerActionInterface;
use Chatbox\LaravelSwagger\Swagger;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema;
use Illuminate\Http\Response;

trait ResponseTestTrait {

	abstract protected function action():SwaggerActionInterface;

	abstract protected function swagger():Swagger;

	public function test():ResponseTest{
		return new ResponseTest();
	}

	public function assertStatusCode(int $expect, Response $response){
		return $this->test()->assertStatusCode($expect,$response->getStatusCode());
	}

	public function assertWithSchema(int $expect, Response $response){
		$responseDef = $this->action()->responses()[$expect];
		$schema = $responseDef->schema();
		if(!$schema){
			throw new \Exception("no schema set");
		}
		//TODO FIX HERE
		// first : set Annonymous
		$schema = $schema->setAnonymous();
		$schema = (string)json_encode($schema);
		$schema = json_decode($schema,true);
		// second : add global schema
		$schema = $this->setGlobalSchemaDef($schema);
		// third : replace schema ref
		$schema = (string)json_encode($schema);
		$schema = str_replace("#\/components\/schemas\/", "#\/definitions\/",$schema);
		$schema = json_decode($schema);

		return $this->test()->assertWithSchema(
			$schema,
			$response->getContent()
		);
	}

	protected function setGlobalSchemaDef(array $schemaDef):array{
		$gschemas = [];
		foreach ( $this->swagger()->getSchemas() as $gschema ) {
			assert($gschema  instanceof Schema);
			$gschemas[$gschema->refname()] = $gschema->setAnonymous();
		}
		if($gschemas){
			$schemaDef["definitions"] = $gschemas;
		}
		return $schemaDef;
	}






}