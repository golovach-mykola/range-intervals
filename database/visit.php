<?php

require "../bootstrap.php";


use Illuminate\Database\Capsule\Manager as Capsule;

if(!Capsule::schema()->hasTable('visits')){
    Capsule::schema()->create('visits', function ($table) {
        $table->increments('id');
        $table->string('ip_address');
        $table->string('user_agent');
        $table->timestamp('view_date')->useCurrent = true;;
        $table->string('page_url');
        $table->integer('views_count')->default(1);
    });
}
die('migrated');