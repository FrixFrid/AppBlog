<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('../../vendor/phpmailer/phpmailer/src/Exception.php');
require ('../../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require ('../../vendor/phpmailer/phpmailer/src/SMTP.php');

$mail = new PHPMailer();
$mail->Host = 'mail.infomaniak.com';               //Adresse IP ou DNS du serveur SMTP
$mail->Port = 465;                          //Port TCP du serveur SMTP
$mail->SMTPAuth = 1;                        //Utiliser l'identification
$mail->isSMTP();
$mail->CharSet = 'UTF-8';
$mail->SMTPDebug = false;

if($mail->SMTPAuth){
    $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
    $mail->Username   =  'hello@ifxmysetup.com';    //Adresse email à utiliser
    $mail->Password   =  '';         //Mot de passe de l'adresse email à utiliser
}

$mail->From       = "hello@ifxmysetup.com";                //L'email à afficher pour l'envoi
$mail->FromName   = $_POST["nom"];          //L'alias de l'email de l'emetteur

$mail->AddAddress('hello@ifxmysetup.com');

$mail->Subject    =  $_POST["sujet"];                      //Le sujet du mail
$mail->WordWrap   = 50; 			       //Nombre de caracteres pour le retour a la ligne automatique
$mail->AltBody = $_POST["message"]; 	       //Texte brut
$mail->MsgHTML($_POST["message"]);

if (!$mail->send()) {
    echo $mail->ErrorInfo;
} else{
    echo 'Message bien envoyé';
}