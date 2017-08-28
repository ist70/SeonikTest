<?php

namespace App\Controllers;

use App\Core\Mvc\Controller;
use App\Core\Mail\SendMail;

class Feedback extends Controller
{

//    public function actionSend()
//    {
//        $name = $_POST['name'];
//        $mail = $_POST['mail'];
//        $phone = $_POST['phone'];
//        $send = $_POST['send'];
//        $file = $_POST['file'];
////        $sendmail = new SendMail();
////        $res = $sendmail->send($mail, $name, $send);
////        var_dump($res);
//
//        ;
//
//        die;
//    }

    /*
$to - адрес получателя письма
$from_mail - адрес отправителя письма
$from_name - имя отправителя письма
$subject - тема письма
$message - само сообщение в HTML-формате
$file_name - путь к файлу, который надо прикрепить к письму
(это может быть имя файла, выбранного в поле <input type="file" name="file_name">)
*/
   public function actionSend()
    {
        $from_mail = 'ist70@mail.ru';
        $from_name = $_POST['name'];
        $to = $_POST['mail'];
        $subject = $_POST['phone'];
        $message = $_POST['send'];
        $file = $_POST['file'];

        $bound = "spravkaweb-1234";
        $header = "From: '$from_name' <$from_mail>n";
        $header .= "To: $to";
        $header .= "Subject: $subject";
        $header .= "Mime-Version: 1.0n";
        $header .= "Content-Type: multipart/mixed; boundary='$bound'";
        $body = "nn--$bound";
        $body .= "Content-type: text/html; charset='windows-1251'\n";
        $body .= "Content-Transfer-Encoding: quoted-printablenn";
        $body .= "$message";
        //$file = fopen($file_name, "rb");
        $body .= "nn--$bound";
        $body .= "Content-Type: application/octet-stream;";
        $body .= "name=" . basename('file') . "\n";
        $body .= "Content-Transfer-Encoding:base64n";
        $body .= "Content-Disposition:attachmentnn";
        $body .= base64_encode($file) . "n";
//        $body .= base64_encode(fread($file, filesize($file_name))) . "n";
        $body .= "$bound--nn";
       var_dump($body);
        if (mail($to, $subject, $body, $header)) {
            echo 'Письмо было успешно отправлено!';
        } else {
            echo 'Сообщение не отправлено!';
        };
    }

}