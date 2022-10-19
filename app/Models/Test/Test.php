<?php

namespace App\Models\Test;

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
	 * @ORM\Column(name="value", type="string", length=255, nullable=false)
	 */
	private string $value;
	
	public function getValue(): string {
		return $this->value;
	}
	
	public function setValue(string $value): Test {
		$this->value = $value;
		return $this;
	}
}
