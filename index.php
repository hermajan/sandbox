<?php
declare(strict_types = 1);

use App\Bootstrap;
use Dotenv\Dotenv;
use Contributte\Console\Application as ContributteApplication;
use Nette\Application\Application as NetteApplication;

require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/app/Bootstrap.php";

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required("APP_ENV")->notEmpty();

// Add Nette
if(php_sapi_name() === "cli") {
    Bootstrap::boot()
        ->createContainer()
        ->getByType(ContributteApplication::class)
        ->run();
} else {
    Bootstrap::boot()
        ->createContainer()
        ->getByType(NetteApplication::class)
        ->run();
}
