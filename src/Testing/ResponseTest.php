<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/11
 * Time: 15:03
 */

namespace Chatbox\LaravelSwagger\Testing;

use Chatbox\LaravelSwagger\Swagger;
use JsonSchema\Constraints\Constraint;

class ResponseTest
{
    public function assertStatusCode(int $expect, int $actual)
    {
        if ($expect === $actual) {
            throw new \Exception("status code doesnt match. expect $expect actual $actual");
        }
        assert(true);
    }

    public function assertWithSchema(object $schema, $actual)
    {
        $actual = $this->convertBody($actual);
        $validator = new \JsonSchema\Validator;
        $validator->validate($actual, $schema, Constraint::CHECK_MODE_TYPE_CAST);

        if ($validator->isValid()) {
            assert(true);
        } else {
            throw new \Exception("invalid schema");
            //			echo "JSON does not validate. Violations:\n";
//			foreach ($validator->getErrors() as $error) {
//				echo sprintf("[%s] %s\n", $error['property'], $error['message']);
//			}
        }
    }

    protected function convertBody($body):array
    {
        return json_decode($body, true);
    }
}
