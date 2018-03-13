<?php
namespace Chatbox\LaravelSwagger\Values\Swagger\v3\Contract;
/**
 *
 * Security Schema は Schema と違って ref 参照しない
 */
interface SecuritySchema {

	public function getName():string;

	public function value(): array;

}