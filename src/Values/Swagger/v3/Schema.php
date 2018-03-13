<?php
namespace Chatbox\LaravelSwagger\Values\Swagger\v3;

use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema as BaseSchema;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/10
 * Time: 2:34
 */
class Schema implements BaseSchema, \JsonSerializable {

	public $refname;

	/** @var  array */
	public $value;

	protected $definitions;

	/**
	 * Schema constructor.
	 *
	 * @param array $value
	 */
	public function __construct( array $value = [] ) {
		$this->value = $value;
	}

	public function refname(): ?string {
		return $this->refname;
	}

	public function value(): array {
		return $this->value;
	}

	function jsonSerialize() {
		if($this->refname()){
			return ["\$ref" => "#/components/schemas/{$this->refname()}"];
		}else{
			return $this->value();
		}
	}

	public function setAnonymous(  ): BaseSchema{
		$this->refname = null;
		return $this;
	}

}