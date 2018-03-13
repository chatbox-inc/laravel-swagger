<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/11
 * Time: 2:16
 */

namespace Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Parameters;

use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema;

interface Parameter
{
    const IN_PATH="path";
    const IN_QUERY="query";
    const IN_HEADER="header";


    public function in():string;

    public function name():string;

    public function description():string;

    public function isRequired():bool;

    public function schema():Schema;
}
