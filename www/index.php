<?php
declare(strict_types = 1);

use App\Bootstrap;
use Contributte\Console\Application as ContributteApplication;
use Dotenv\Dotenv;
use Nette\Application\Application as NetteApplication;

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../app/Bootstrap.php";

$dotenv = Dotenv::createImmutable(__DIR__."/..");
$dotenv->load();
$dotenv->required("APP_ENV")->notEmpty();

// Add Nette
$container = Bootstrap::boot()->createContainer();
if(php_sapi_name() === "cli") {
	$container->getByType(ContributteApplication::class)->run();
} else {
	$container->getByType(NetteApplication::class)->run();
}
