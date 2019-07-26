<?php
use Dotenv\Dotenv;

require_once __DIR__."/vendor/autoload.php";

$dotenv = new Dotenv(__DIR__);
$dotenv->load();

// Add Nette
require_once __DIR__."/app/bootstrap.php";

