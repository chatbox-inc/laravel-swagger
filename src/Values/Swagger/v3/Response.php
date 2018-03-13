<?php
namespace Chatbox\LaravelSwagger\Values\Swagger\v3;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\MediaType;
use Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Schema;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/03/10
 * Time: 2:34
 */
class Response implements \Chatbox\LaravelSwagger\Values\Swagger\v3\Contract\Response,\JsonSerializable {

	public $code;

	public $description;

	public $headers;

	public $content;

	public $schema;

	use PropAssign;

	public function code(): int {
		return $this->code;
	}

	public function description(): ?string {
		return $this->description;
	}

	public function headers(): ?array {
		return $this->headers;
	}

	public function content(): ?MediaType {
		return $this->content;
	}

	public function schema(): ?Schema{
		return $this->content()?
			$this->content()->schema():
			$this->schema;
	}

	function jsonSerialize() {
		$data = [];
		($values = $this->description()) && (!is_null($values)) && ($data["description"] = $values);
		($values = $this->headers()) && (!is_null($values)) && ($data["headers"] = $values);
		if($content = $this->content()){
			$data["content"] = [
				$content->mime() => $content
			];
		}else if($schema = $this->schema()){
			$data["content"] = [
				"application/json" => [
					"schema" => $schema
				]
			];
		}
		return $data;
	}


}