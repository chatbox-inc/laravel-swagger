<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/11
 * Time: 2:06
 */

namespace Chatbox\LaravelSwagger\Testing\Lumen;

use Chatbox\LaravelSwagger\Http\Actions\SwaggerActionInterface;
use Chatbox\LaravelSwagger\Swagger;
use Chatbox\LaravelSwagger\Testing\ResponseTestTrait;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Parameters\Parameter;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;

/**
 * Class ActionTest
 * TODO Laravel 版と合わせて Interface を作る
 * @package Chatbox\LaravelSwagger\Testing\Lumen
 */
class Inspector
{
    use \Laravel\Lumen\Testing\Concerns\MakesHttpRequests;
    use ResponseTestTrait;

    /** @var SwaggerActionInterface */
    protected $action;

    protected $app;

    protected $baseUrl = "";
    /**
     * ActionTest constructor.
     *
     */
    public function __construct(SwaggerActionInterface $action)
    {
        $this->app = app();
        $this->action = $action;
        $this->baseUrl = env("SWAGGER_ENTRY", "http://localhost:8000");
    }

    protected function action(): SwaggerActionInterface
    {
        return $this->action;
    }

    protected function swagger(): Swagger
    {
        return app("swagger");
    }


    public function request(array $params=[], array $headers=[]):Response
    {
        $server = $this->transformHeadersToServerVars($headers);

        $path = $this->action()->path();

        foreach ($params as $name => $value) {
            foreach ($this->action()->parameters() as $parameter) {
                if ($parameter->name() === $name) {
                    if ($parameter->in() === Parameter::IN_PATH) {
                        $path = str_replace("{".$name."}", $value, $path);
                    }
                }
            }
        }

        $this->call(strtoupper($this->action->method()), $path, $params, [], [], $server);

        return $this->response;
    }

    protected function detectParamsAndHeaders(array $data)
    {
        //		$params = [];
//		$headers = [];
//		foreach ( $data as $key => $value ) {
//			if(!$params = array_get($this->action->parameters(),$key)){
//				return [];
//			}
//		}
    }
}
