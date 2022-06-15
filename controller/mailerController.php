<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class MailerController 
{
			//Email al que se envia, mensaje que recibe , el titulo del email.
	public static function sendEmail($email,$message,$subject)
	{
		$smtpUsername = "zulhowtest@gmail.com";//email de envios
		$smtpPassword = "hmnqlwwmgcswzybh";//contraseña del email
		$emailFrom = "zulhowtest@gmail.com";
		$emailFromName = "ZULHOW";
		$emailTo = $email;
		$mail = new PHPMailer;
		$mail->isSMTP(); 
		$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
		$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
		$mail->Port = 587; // TLS only
		$mail->SMTPSecure = "tls"; // ssl is depracated
		$mail->SMTPAuth = true;
		$mail->Username = $smtpUsername;
		$mail->Password = $smtpPassword;
		$mail->setFrom($emailFrom, $emailFromName);
		$mail->addAddress($emailTo, "");
		$mail->Subject = $subject;//Titulo
		$mail->Body = $message;//Mensaje 
		$mail->IsHTML(true);
		$sent = $mail->send();
		if($mail->send()){
			return true;
		}
		else{
			return false;
		}
	}
}
 ?>