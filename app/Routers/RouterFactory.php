<?php
declare(strict_types = 1);

namespace App\Routers;

use Nette\Application\Routers\{Route, RouteList};
use Nette\StaticClass;

final class RouterFactory {
	use StaticClass;
	
	/**
	 * @return RouteList
	 */
	public static function createRouter() {
		$router = new RouteList;
		$router[] = new Route("<presenter>/<action>", "Homepage:default");
		return $router;
	}
}
