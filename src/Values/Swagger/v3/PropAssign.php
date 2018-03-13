<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/11
 * Time: 16:28
 */

namespace Chatbox\LaravelSwagger\Values\Swagger\v3;


trait PropAssign {

	public function __construct(array $data=[]) {
		foreach ( (array) $this as $key => $value ) {
			if(array_has($data,$key)){
				$this->{$key} = array_get($data,$key);
			}
		}
	}

}