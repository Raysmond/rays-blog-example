<?php
/**
 * PHPMailer helper class
 * @author: Raysmond
 * @date: 13-11-27
 */

class MailHelper
{

    public static $host = 'smtp.126.com';

    public static $smtpAuth = true;

    public static $userName = "jiankunlei";

    public static $password = "29405832bestljk";

    public static $fromEmail = "jiankunlei@126.com";

    public static $fromName = "Raysmond.com";

    public static $defaultReplyTo = "jiankunlei@126.com";

    public static $isHtml = true;

    public static $stmpSecure = "tls"; // Enable encryption, 'ssl' also accepted

    public static function sendEmail($subject, $body, $toEmails, $fromName = null, $fromEmail=null)
    {
        Rays::import("application.vendors.phpmailer.PHPMailerAutoload");

        $mail = new PHPMailer;

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = self::$host; // Specify main and backup server
        $mail->SMTPAuth = self::$smtpAuth; // Enable SMTP authentication
        $mail->Username = self::$userName; // SMTP username
        $mail->Password = self::$password; // SMTP password
        //$mail->SMTPSecure = self::$stmpSecure;              // Enable encryption, 'ssl' also accepted

        $fromEmail = isset($fromEmail) ? $fromEmail : self::$fromEmail;
        $fromName = isset($fromName) ? $fromName : self::$fromName;
        $mail->From = $fromEmail;
        $mail->FromName = $fromName;
        if (is_string($toEmails))
            $mail->addAddress($toEmails);
        else {
            foreach ($toEmails as $email) {
                $mail->addAddress($email);
            }
        }
        $mail->addReplyTo($fromName, $fromEmail);
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        $mail->WordWrap = 50; // Set word wrap to 50 characters
        //$mail->addAttachment('/var/tmp/file.tar.gz');       // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');  // Optional name
        $mail->isHTML(self::$isHtml); // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body = $body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            return $mail->ErrorInfo;
        }

        return true;
    }

} 