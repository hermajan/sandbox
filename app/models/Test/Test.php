<?php

namespace App\Models\Exam;

use Doctrine\ORM\Mapping as ORM;
use Nettrine\ORM\Entity\Attributes\Id;

/**
 * Test
 *
 * @ORM\Table(name="`test`")
 * @ORM\Entity
 */
class Test {
	use Id;
	
	/**
	 * @var string
	 * @ORM\Column(name="value", type="string", length=255, nullable=false)
	 */
	private $value;
	
	/**
	 * @return string
	 */
	public function getValue(): string {
		return $this->value;
	}
	
	/**
	 * @param string $value
	 * @return Test
	 */
	public function setValue(string $value): Test {
		$this->value = $value;
		return $this;
	}
}
