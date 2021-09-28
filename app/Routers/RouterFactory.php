<?php
declare(strict_types = 1);

namespace App\Routers;

use Nette\Application\Routers\{Route, RouteList};
use Nette\StaticClass;

final class RouterFactory {
	use StaticClass;
	
	public static function createRouter(): RouteList {
		$router = new RouteList;
		$router[] = new Route("<presenter>/<action>", "Homepage:default");
		return $router;
	}
}
