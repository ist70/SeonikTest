<?php

namespace App\Controllers;

use App\Core\Mvc\Controller;
use App\Core\Mail\SendMail;

class Feedback extends Controller
{

    public function actionSend()
    {
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $phone = $_POST['phone'];
        $send = 'Телефон: ' . $phone . '<br>' .$_POST['send'];
        $file = $_POST['file'];
        $filename = $_POST['filename'];
        $sendmail = new SendMail();
        $res = $sendmail->send($mail, $name, $send, $file, $filename);
        return $res;
    }

}