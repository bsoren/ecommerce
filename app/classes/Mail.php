<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 13-Mar-18
 * Time: 6:37 PM
 */

namespace App\classes;

use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->setup();
    }

    public function setup(){

        $this->mail->isSMTP();
        $this->mail->Mailer = 'smtp';
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls';

        $this->mail->Host = getenv('SMTP_HOST');
        $this->mail->Port = getenv('SMTP_PORT');

        $environment = getenv('APP_ENV');
        if($environment === 'local'){$this->mail->SMTPDebug = 2; }

        // auth info
        $this->mail->Username = getenv('EMAIL_USERNAME');
        $this->mail->Password = getenv('EMAIL_PASSWORD');

        $this->mail->isHTML(true);
        $this->mail->SingleTo = true;

        //send info

        $this->mail->From = getenv('ADMIN_EMAIL');
        $this->mail->FromName = getenv('Acme Store');

    }

    public function send($data){

        $this->mail->addAddress($data['to'], $data['name']);
        $this->mail->Subject = $data['subject'];
        $this->mail->Body = make($data['view'], array('data' => $data['body']));
        return $this->mail->send();
    }
}