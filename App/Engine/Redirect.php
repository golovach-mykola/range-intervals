<?php

namespace App\Engine;

use App\App;

class Redirect {

    static public function go($path)
    {
        header('Location: '.$path);
    }
}

