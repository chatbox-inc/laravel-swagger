<?php
namespace Chatbox\LaravelSwagger\Commands;

//use Chatbox\LaravelSwagger\Service\SwaggerLoader;
//use Chatbox\LaravelSwagger\Values\Route;
use Chatbox\LaravelSwagger\Service\SwaggerGenerator;
use Chatbox\LaravelSwagger\Swagger;
use Illuminate\Console\Command;
use Symfony\Component\Yaml\Yaml;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/02/16
 * Time: 17:51
 */
class SwaggerGen extends Command {

	protected $signature = "swagger:gen";


	public function handle(SwaggerGenerator $swagger) {

		$doc = $swagger->generate();


		echo Yaml::dump($doc,99,2);




	}



}