<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/11
 * Time: 2:16
 */

namespace Chatbox\LaravelSwagger\Values\Swagger\v3\Parameters;

use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Parameters\Parameter;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\PropAssign;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Schema\StringSchema;

class PathParameter implements Parameter, \JsonSerializable {

	use PropAssign;

	public $name;

	public $description;

	public $schema;

	public function in(): string {
		return Parameter::IN_PATH;
	}

	public function name(): string {
		return $this->name;
	}

	public function description(): string {
		return $this->description;
	}

	public function isRequired(): bool {
		return true;
	}

	public function schema(): Schema {
		return $this->schema?:new StringSchema();
	}

	public function jsonSerialize() {
		return [
			"in" => $this->in(),
			"description" => $this->description(),
			"name" => $this->name(),
			"schema" => $this->schema(),
			"required" => $this->isRequired()
		];
	}

}