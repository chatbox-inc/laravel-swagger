<?php
namespace Chatbox\LaravelSwagger\Support;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/12
 * Time: 14:56
 */
class Utils {

	static public function isLaravel(){
		return strpos(app()->version(),"Lumen") === false;
	}

	static public function isLumen(){
		return !static::isLaravel();
	}

}