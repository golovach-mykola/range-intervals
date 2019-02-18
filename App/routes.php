<?php

use App\Engine\Storage;

$router = Storage::get('Router');

$router->get('/api/interval', 'IntervalController@get');
$router->post('/api/interval', 'IntervalController@add');
$router->put('/api/interval', 'IntervalController@add');
$router->delete('/api/interval', 'IntervalController@delete');