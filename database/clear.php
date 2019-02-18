<?php

require "../App/bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

if(Capsule::schema()->hasTable('intervals')){
    \App\models\Interval::truncate();
}
die('cleared');