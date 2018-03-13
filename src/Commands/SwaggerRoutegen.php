<?php
namespace Chatbox\LaravelSwagger\Commands;

//use Chatbox\LaravelSwagger\Service\SwaggerLoader;
//use Chatbox\LaravelSwagger\Values\Route;
use Illuminate\Console\Command;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/02/16
 * Time: 17:51
 */
class SwaggerRoutegen extends Command {

	protected $signature = "swagger:route-gen {path}";


//	public function handle(SwaggerLoader $swaggerLoader) {
//		$path = getcwd()."/".$this->argument("path");
//
//		$routes = $swaggerLoader->fromPath($path);
//		$this->line("<?php");
//		foreach ( $routes as $route ) {
//			$line = $this->generateLine($route);
//			$this->line($line);
//		}
//
//
//	}


//	public function generateLine(Route $route){
//		$template = <<<PHP
//\$router->{$route->methods}('{$route->path}','{$route->operationId}');
//PHP;
//		return $template;
//	}

}