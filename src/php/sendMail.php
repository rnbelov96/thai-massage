<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);
    $mail->setFrom('site@mysite.ru');
    $mail->addAddress('melega@bk.ru');
    $mail->Subject = 'Новая заявка';

    $body .= '<h1>Заявка на сайте франшизы "Баланс Эксперт".</h1>';

    if (trim(!empty($_POST['name']))) {
        $body .= '<p><strong>Имя</strong>: '.$_POST['name'].'</p>';
    }
    if (trim(!empty($_POST['phone']))) {
        $body .= '<p><strong>Телефон</strong>: '.$_POST['phone'].'</p>';
    }
    if (trim(!empty($_POST['email']))) {
        $body .= '<p><strong>Email</strong>: '.$_POST['email'].'</p>';
    }
    $mail->Body = $body;
    if (!$mail->send()) {
        header("Location: error.html");
        exit();
    } else {
        header("Location: thanks.html");
        exit();
    }
?>