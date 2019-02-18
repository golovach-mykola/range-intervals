<?php

require_once __DIR__ ."/../vendor/autoload.php";

require "config.php";
use App\Engine\DI;
use Illuminate\Database\Capsule\Manager as Capsule;

DI::start();

$capsule = new Capsule;

$capsule->addConnection($config);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();

require "routes.php";