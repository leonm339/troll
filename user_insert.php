<?php

include_once 'database.php';

//sprejmem podatke s prejšnje strani
$username = $_POST['username'];
$mailPost = $_POST['mail'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if ($pass1 == $pass2) {
    $pass1 = $db_salt . $pass1;
    $pass1 = sha1($pass1);

    $query = sprintf("INSERT INTO users(username, email, pass) 
            VALUES ('%s','%s','%s')", mysqli_real_escape_string($link, $username), mysqli_real_escape_string($link, $mailPost), mysqli_real_escape_string($link, $pass1));

    if (mysqli_query($link, $query)) {
        //vse je ok
        //pošlji welcome mail
        require './mailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = "evidenca.scv@gmail.com";
        $mail->Password = "";
        $mail->setFrom('islam.music@gmail.com', 'First Last');
        $mail->addAddress($mailPost, 'John Doe');
        $mail->Subject = 'Welcome';
        $mail->Body ="<b>Welcome</b>";
        $mail->AltBody = 'This is a plain-text message body';
        $mail->send();
        //pojdi nazaj
        header("Location: index.php");
        die();
    } else {
        //napaka
        header("Location: registration.php");
        die();
    }
} else {
    //preusmerimo nazaj na registracijo
    header("Location: registration.php");
    die();
}
?>