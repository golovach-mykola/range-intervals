<?php
require "App/bootstrap.php";


use App\Engine\Storage;

$app = Storage::get('App');

try {
    $app->run();
} catch (\Exception $e) {
    print_r($e->getMessage());
}