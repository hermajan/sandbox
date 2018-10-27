<?php
require __DIR__ . "/../vendor/autoload.php";

use Nette\Configurator;

// Let bootstrap create Dependency Injection container.
$configurator = new Configurator;
$configurator->setTimeZone("Europe/Prague");

// Enable Nette Debugger for error visualisation & logging
$logDir = __DIR__."/../_log";
if(!file_exists($logDir)) { mkdir($logDir, 0777, true); }
$configurator->enableTracy($logDir);

$tempDir = __DIR__."/../.temp";
if(!file_exists($tempDir)) { mkdir($tempDir, 0777, true); }
$configurator->setTempDirectory($tempDir);

// Enable RobotLoader - this will load all classes automatically
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

$configurator->addConfig(__DIR__."/config/config.neon");
$configurator->addConfig(__DIR__."/config/parameters.neon");

if(isset($_ENV["APP_ENV"])) {
	switch($_ENV["APP_ENV"]) {
		case "dev": case "development": default:
			$configurator->addConfig(__DIR__."/config/development.neon");
			break;
			
		case "stage":
			$configurator->addConfig(__DIR__."/config/stage.neon");
			break;
			
		case "prod": case "production":
			$configurator->addConfig(__DIR__."/config/production.neon");
			break;
	}
} else {
	$configurator->addConfig(__DIR__."/config/development.neon");
}

$container = $configurator->createContainer();
return $container;
