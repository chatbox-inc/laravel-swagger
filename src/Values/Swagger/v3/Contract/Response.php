<?php
namespace Chatbox\LaravelSwagger\Values\Swagger\v3\Contract;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/10
 * Time: 2:34
 */
interface Response {

	public function code():int;

	public function description():?string ;

	public function headers():?array;

	public function content(): ?MediaType;

	public function schema(): ?Schema;
}