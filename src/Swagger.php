<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/11
 * Time: 2:05
 */

namespace Chatbox\LaravelSwagger;


use Chatbox\LaravelSwagger\Http\Actions\SwaggerActionInterface;
use Chatbox\LaravelSwagger\Support\Utils;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\SecuritySchema;
use Laravel\Lumen\Routing\Router;

class Swagger {

	public $namespace; // namespace trailing bashslash(\)

	/** @var SwaggerActionInterface[]  */
	protected $actions = [];

	/** @var Schema[] */
	protected $schemas = [];

	/** @var SecuritySchema[] */
	protected $security = [];

	/**
	 * @param SwaggerActionInterface|string $action
	 */
	public function addAction($action){
		if(! $action instanceof SwaggerActionInterface){
			$action = app()->make($action);
		}
		assert($action instanceof SwaggerActionInterface);
		$this->actions[] = $action;
	}

	/**
	 * @return SwaggerActionInterface[]
	 */
	public function getActions():array {
		return $this->actions;
	}

	/**
	 * @param Schema|SecuritySchema|string $schema
	 */
	public function addSchema($schema){
		if(is_string($schema)){
			$schema = app()->make($schema);
		}
		if($schema instanceof Schema) {
			$this->schemas[] = $schema;
		}else if($schema instanceof SecuritySchema){
			$this->security[] = $schema;
		}
	}

	/**
	 * @return Schema[]
	 */
	public function getSchemas():array {
		return $this->schemas;
	}

	/**
	 * @return Schema[]
	 */
	public function getSecurity():array {
		return $this->security;
	}

	public function test($action){

	}

	public function route($router){
		if(Utils::isLumen()){
			$this->setUpLumenRoute($router);
		}
	}

	protected function setUpLumenRoute(Router $route){
		foreach ( $this->actions as $action ) {
			$route->{$action->method()}($action->path(),get_class($action));
		}
	}




}