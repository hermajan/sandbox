<?php
namespace App\Services;

class MetaService {
	private $parameters;

	public function __construct(array $parameters) {
		$this->parameters = $parameters;
	}
	
	/**
	 * @param string $key
	 * @return array|string|null
	 */
	public function getParameter(string $key) {
		if(array_key_exists($key, $this->parameters)) {
			return $this->parameters[$key];
		}
		return null;
	}
}
