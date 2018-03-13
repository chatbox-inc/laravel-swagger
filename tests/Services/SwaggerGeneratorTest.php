<?php
namespace Chatbox\LaravelSwagger\Test\Service;

use Chatbox\LaravelSwagger\Service\SwaggerGenerator;
use Chatbox\LaravelSwagger\Swagger;
use Chatbox\LaravelSwagger\Test\TestCase;
use Symfony\Component\Yaml\Yaml;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/12
 * Time: 15:40
 */
class SwaggerGeneratorTest extends TestCase {


	protected function swaggerGen():SwaggerGenerator{
		return app(SwaggerGenerator::class);
	}

	protected function swagger():Swagger{
		return app("swagger");
	}

	protected function sampleDoc():array{
		$contents = (string)file_get_contents(__DIR__."/../Examples/example.yml");
		$contents = Yaml::parse($contents);
		return $contents;
	}

	public function testGenerate(){

		$pathItems = $this->swaggerGen()->generate();
		$sampleDoc = $this->sampleDoc();

		$this->assertTrue(true);

		foreach ( $this->swagger()->getActions() as $action ) {
			$this->assertNotEmpty($genOp = array_get($pathItems,"paths.{$action->path()}.{$action->method()}"));
			$this->assertNotEmpty($expOp = array_get($sampleDoc,"paths.{$action->path()}.{$action->method()}"));
			$this->assertEquals($expOp,$genOp);
		}
		$this->assertEquals($pathItems,$sampleDoc);
	}

}