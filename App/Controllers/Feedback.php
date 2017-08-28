<?php

namespace App\Controllers;

use App\Core\Mvc\Controller;

class Feedback extends Controller
{

    public function send()
    {
        var_dump($_POST);
        die;
    }

}