<?php

namespace App\Core\Mail;

class SendMail
{

    public function send($to, $subject, $send, $file, $filename, $from = '', $reply_to = '')
    {
        $transport = \Swift_SmtpTransport::newInstance('smtp.mail.ru', 465, 'ssl')
            ->setUsername('ist70@mail.ru')
            ->setPassword('qwertyQQQ1');

        $message = \Swift_Message::newInstance($subject)
            ->setFrom('ist70@mail.ru')
            ->setTo($to)
            ->setContentType("text/html; charset=UTF-8")
            ->setBody($send, 'text/html');
        $message->attach(\Swift_Attachment::newInstance($file, $filename));

        try{
            $mailer = \Swift_Mailer::newInstance($transport);
            $res = $mailer->send($message);
        }catch(\Swift_TransportException $e){
            $response = $e->getMessage() ;
            var_dump($response);
        }
        return $res;
    }

}
