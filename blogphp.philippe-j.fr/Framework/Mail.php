<?php

namespace App\Framework;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class Mail
 */
class Mail extends Request

{
    private $token;

    /**
     * @return void
     */
    public function createToken()
    {
        return $this->token = bin2hex(openssl_random_pseudo_bytes(16));
    }


    /**
     * @param Method $postMethod
     * @param mixed $token
     * 
     * @return void
     */
    public function registerMail(Method $postMethod, $token)
    {
        $pseudo = htmlspecialchars($this->postMethod->getParameter('pseudo'));
        $email = htmlspecialchars($this->postMethod->getParameter('email'));

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username   = ADMIN_EMAIL_ADRESS;
        $mail->Password = PASSWORD;
        $mail->setFrom(ADMIN_EMAIL_ADRESS, 'Philippe Jaming');
        $mail->Subject = 'Finalisez votre inscription   ' . $pseudo;
        $mail->addAddress($email, $pseudo);
        $mail->isHTML(true);

        $link = '<a href="http://' . HOST . PORT . '/?route=emailConfirm&pseudo=' . $pseudo . '&token=' . $token . '" target="_blank">CLIQUER ICI</a>';
        $mail->Body = '
        <html>
        <body>
            <div>
            Bonjour ' . $pseudo . ' ! <br><br>
            Pour finaliser votre inscription, merci de <br>'
            . $link . '<br>
            pour vérifier votre adresse email. <br><br>
            A Bientôt
        </div>
        </body>
        </html> ';

        $mail->send();
    }




    /**
     * @param Method $postMethod
     * 
     * @return void
     */
    public function contactMail(Method $postMethod)
    {
        $name = htmlspecialchars($this->postMethod->getParameter('name'));
        $email = htmlspecialchars($this->postMethod->getParameter('email'));
        $message = htmlspecialchars($this->postMethod->getParameter('message'));
        $phone = htmlspecialchars($this->postMethod->getParameter('phone'));

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 3;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username   = ADMIN_EMAIL_ADRESS;
        $mail->Password = PASSWORD;
        $mail->setFrom($email, $name);
        $mail->Subject = 'Nouveau contact';
        $mail->addAddress(ADMIN_EMAIL_ADRESS, 'Jaming Philippe');
        $mail->isHTML(true);
        $mail->Body = '
        <html>
        <body>
        
        <h1>Un Visiteur vous a envoyé un nouveau message</h1>
            <div>
            ' . $name . ' vous a envoyé un message.<br>
            <p>Téléphone :' . $phone . '</p>
            <p>Email : ' . $email . '</p>
            <p>Message : ' . $message . '  </p>
            
        </div>
        </body>
        </html> ';

        $mail->send();
    }
}
