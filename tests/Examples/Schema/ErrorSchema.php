<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/11
 * Time: 15:22
 */

namespace Chatbox\LaravelSwagger\Test\Examples\Schema;

use Chatbox\LaravelSwagger\Values\Swagger\v3\Schema;

class ErrorSchema extends Schema {

	public $refname = "Error";

	public function value(): array {
		return [
			"required" => ["code","message"],
			"properties" => [
				"code" => new Schema\IntegerSchema(),
				"message" => new Schema\StringSchema(),
			]
		];
	}
}