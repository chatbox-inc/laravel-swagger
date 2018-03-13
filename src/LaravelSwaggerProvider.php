<?php
namespace Chatbox\LaravelSwagger;

use Chatbox\LaravelSwagger\Commands\SwaggerGen;
use Chatbox\LaravelSwagger\Commands\SwaggerRoutegen;
use Illuminate\Support\ServiceProvider;

class LaravelSwaggerProvider extends ServiceProvider {

	public function register(){

		$this->app->singleton("swagger",function(){
			return new Swagger();
		});
		$this->app->singleton(Swagger::class,function(){
			return app("swagger");
		});

		config()->push("view.paths",__DIR__."/../resources/views/");

		config()->set("swagger",[
			"document" => [
				"openapi" => "3.0.0",
				"info" => [
					"version" => "1.0.0",
					"title" => "Swagger Petstore",
					"license" => ["name" => "MIT"],
				],
				"servers" => [
					["url" => "http://petstore.swagger.io/v1"]
				],
			]
		]);

		$this->commands([
			SwaggerRoutegen::class,
			SwaggerGen::class
		]);

	}
}