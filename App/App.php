<?php

namespace App;

use App\Engine\Router;
use App\Engine\Storage;

class App {

    /**
     * @var Router
     */
    private $router;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->router = Storage::get('Router');
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        $current_request = $this->router->getCurrent();
        $controller = new $current_request->controller;
        $response = $controller->{$current_request->method}();
        $response->render();
    }
}
