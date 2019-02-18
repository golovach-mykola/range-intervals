<?php

require "../App/bootstrap.php";


use Illuminate\Database\Capsule\Manager as Capsule;

if(!Capsule::schema()->hasTable('intervals')){
    Capsule::schema()->create('intervals', function ($table) {
        $table->increments('id');
        $table->timestamp('date_start');
        $table->timestamp('date_end');
        $table->float('price');
    });
}
die('migrated');