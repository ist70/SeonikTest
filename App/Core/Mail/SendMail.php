<?php

namespace App\Core\Mail;

class SendMail
{

    public static function send($to, $title, $mess)
    {
        $transport = \Swift_SmtpTransport::newInstance('smtp.mail', 465, 'ssl')
            ->setUsername('ist70')
            ->setPassword('');

        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance()
            ->setFrom('ist70@mail.ru')
            ->setTo($to)
            ->setSubject($title)
            ->setBody($mess);

        return $mailer->send($message);
    }

    public function send2($to, $subject, $message, $from = '', $reply_to = '')
    {
        $transport = \Swift_SmtpTransport::newInstance('smtp.mail.ru', 465, 'ssl')
            ->setUsername('ist70@mail.ru')
            ->setSourceIp('0.0.0.0')
            ->setPassword('qwertyQQQ1');

//            ->setUsername('ist70@mail.ru')
//            ->setPassword('qwertyQQQ1');



        $message = \Swift_Message::newInstance($subject)
            ->setFrom('ist70@mail.ru')
            ->setTo($to)
            ->setContentType("text/html; charset=UTF-8")
            ->setBody($message, 'text/html');

//        $result = $mailer->send($messages);
        try{
            $mailer = \Swift_Mailer::newInstance($transport);
            $response = $mailer->send($message);
        }catch(\Swift_TransportException $e){
            $response = $e->getMessage() ;
            var_dump($response);
        }
    }
}
