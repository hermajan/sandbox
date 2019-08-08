<?php
use Dotenv\Dotenv;

require_once __DIR__."/vendor/autoload.php";

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();
$dotenv->required("APP_ENV")->notEmpty();

// Add Nette
require_once __DIR__."/app/bootstrap.php";

