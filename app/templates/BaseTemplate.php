<?php

namespace App\Templates;

use App\Services\MetaService;
use Nette\Bridges\ApplicationLatte\Template;

class BaseTemplate extends Template
{
    /** @var MetaService */
	public $meta;
}
