<?php
require __DIR__."/../vendor/autoload.php";

use Nette\Configurator;
use Tester\{Dumper, Environment};

Environment::setup();
date_default_timezone_set("Europe/Prague");

$configurator = new Configurator;
$configurator->setDebugMode(false);

$temp = __DIR__."/../.temp";
if(!is_dir($temp)) {
	mkdir($temp, 0777, true);
}
$configurator->setTempDirectory($temp);
Dumper::$dumpDir = $temp."/tests";

$configurator->createRobotLoader()
	->addDirectory(__DIR__."/../app")
	->register();

$configurator->addParameters([
	"appDir" => __DIR__."/../app",
]);

$configurator->addConfig(__DIR__."/../app/config/config.neon");

return $configurator->createContainer();
