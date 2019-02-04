<?php

require "vendor/autoload.php";
require "config.php";

use Illuminate\Database\Capsule\Manager as Capsule;



$capsule = new Capsule;


$capsule->addConnection($config);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();


spl_autoload_register(function ($class_name) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class_name).'.php';
    if (file_exists($file)) {
        require $file;
        return true;
    }
    return false;
});