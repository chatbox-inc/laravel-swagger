<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/11
 * Time: 15:22
 */

namespace Chatbox\LaravelSwagger\Test\Examples\Schema;

use Chatbox\LaravelSwagger\Values\Swagger\v3\Schema;

class PetsSchema extends Schema {

	public $refname = "Pets";

	public function value(): array {
		return [
			"type" => "array",
			"items" => new PetSchema(),
		];
	}
}