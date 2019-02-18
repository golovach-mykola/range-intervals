<?php

namespace App\Engine;

use App\Engine\Request;
use App\Engine\Storage;

class Response {

    /**
     * @var string
     */
    public $content;

    /**
     * @var Request
     */
    public $request;

    public function __construct()
    {
        $this->request = Storage::get('Request');
    }

    public function json() {
        header('Content-Type: application/json');
        $this->content = json_encode($this->content);
        return $this;
    }

    public function render()
    {
        echo $this->content;
        return $this;
    }
}
