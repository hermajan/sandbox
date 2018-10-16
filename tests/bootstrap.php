<?php
require __DIR__ . "/../vendor/autoload.php";

use Nette\Configurator;
use Tester\Environment;

Environment::setup();

$configurator = new Configurator;
$configurator->setDebugMode(false);
$configurator->setTempDirectory(__DIR__."/../temp");
$configurator->createRobotLoader()
	->addDirectory(__DIR__."/../app")
	->register();

$configurator->addConfig(__DIR__."/../app/config/config.neon");

return $configurator->createContainer();
