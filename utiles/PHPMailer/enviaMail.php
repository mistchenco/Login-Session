<?php
// include_once '../estructura/cabecera.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

/**
 * 
 */
class enviarMail{
 
    private $mail;
    private $host;
    private $SMTPAuth;
    private $Username;
    private $Password;
    private $SMTPSecure;
    private $Port;

    private $mailFrom;
    private $mailSender;
    function __construct()
    {
        $this->mail       = new PHPMailer(true);
        $this->host       ="smtp.gmail.com";
        $this->SMTPAuth   =true;
        $this->Username   ="programacionweb73@gmail.com";
        $this->Password   ="fai38493294";
        $this->SMTPSecure ="TLS";
        $this->Port       =587;
        
        $this->mailFrom   ="programacionweb73@gmail.com";
        $this->mailSender ="Administracion de Sistemas";
    }

    public function newEmail($mailFrom="", $mailSender="",  $mailFor="", $mailRecipientName="", $mailSubject="", $mailBody="")
    {
        try {
            //Server settings
            $this->mail->SMTPDebug = false;
            $this->mail->isSMTP();
            $this->mail->Host       = $this->host;
            $this->mail->SMTPAuth   = $this->SMTPAuth;
            $this->mail->Username   = $this->Username;
            $this->mail->Password   = $this->Password;
            $this->mail->SMTPSecure = $this->SMTPSecure;
            $this->mail->Port       = $this->Port;

            //Recipients
            $mailFrom =($mailFrom=="" || empty($mailFrom))?$this->mailFrom:$mailFrom;
            $mailSender =($mailSender=="" || empty($mailSender))?$this->mailSender:$mailSender;

            $this->mail->setFrom($mailFrom, $mailSender);
            $this->mail->addAddress($mailFor, $mailRecipientName);     // Add a recipient
            $this->mail->addReplyTo($mailFrom, $mailSender);
       

            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $mailSubject;
            $this->mail->Body    = $mailBody;
            $this->mail->AltBody = 'Su gestor de correos no soporta HTML.';

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return "Ocurrió un error al enviar el correo: {$this->mail->ErrorInfo}";
        }
    }
}