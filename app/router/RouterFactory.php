<?php
namespace App;

use Nette\Application\IRouter;
use Nette\Application\Routers\{Route, RouteList};
use Nette\StaticClass;

final class RouterFactory {
	use StaticClass;
	
	/**
	 * @return IRouter
	 */
	public static function createRouter() {
		$router = new RouteList;
		$router[] = new Route("<presenter>/<action>", "Homepage:default");
		return $router;
	}
}
