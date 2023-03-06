<?php
session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendemail_verify($name,$email,$verify_token)
{
    
    $mail = new PHPMailer(true);
    //Server settings
    // $mail->SMTPDebug = 1;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'sensitive info here';                     //Set the SMTP server to send through
    $mail->Username   = 'sensitive info here';                     //SMTP username
    $mail->Password   = 'sensitive info here';                               //SMTP password

    $mail->SMTPSecure = "sensitive info here";            //Enable implicit TLS encryption
    $mail->Port       = sensitive info here;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sensitive info here', $name);
    $mail->addAddress($email);     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email verification from Webook';
    $email_template = "
    <h2>You have registered with Webook</h2>
    <h4>Verify your email address to Login with the below given link</h5>
    <br/><br/>
    <a href='https://webook.ro/verify-email.php?token=$verify_token'> Click here! </a>
    ";
    $mail->Body    = $email_template;
    $mail->send();
   // echo 'Message has been sent';
   
    
}

function sendemail_welcome($name,$email)
{
    
    $mail = new PHPMailer(true);
    //Server settings
    // $mail->SMTPDebug = 1;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'sensitive info here';                     //Set the SMTP server to send through
    $mail->Username   = 'sensitive info here';                     //SMTP username
    $mail->Password   = 'sensitive info here';                               //SMTP password

    $mail->SMTPSecure = "sensitive info here";            //Enable implicit TLS encryption
    $mail->Port       = sensitive info here;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sensitive info here', $name);
    $mail->addAddress($email);     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome to WEBOOK!';
    $email_template = file_get_contents('email.html');
    $mail->Body    = $email_template;
    $mail->send();
   // echo 'Message has been sent';
   
    
}

if (isset($_POST['register_btn'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = "Invalid email format.";
        header("Location: register.php");
        exit();
    }

    if (strlen($password) < 8) {
        $_SESSION['status'] = "Password must be at least 8 characters long.";
        header("Location: register.php");
        exit();
    }

    if (!hash_equals($password, $confirm_password)) {
        $_SESSION['status'] = "Passwords did not match.";
        header("Location: register.php");
        exit();
    }

    $email = mysqli_real_escape_string($con, $email);

    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email ID already exists";
        header("Location: register.php");
        exit();
    }

    $verify_token = bin2hex(random_bytes(16));
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $con->prepare("INSERT INTO users (name,phone,email,password,verify_token) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $name, $phone, $email, $hashed_password, $verify_token);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        sendemail_verify($name, $email, $verify_token);
        sendemail_welcome($name, $email);
        $_SESSION['status'] = "Registration Succesfull! Please verify your email Address.";
        header("Location: register.php");
        exit();
    } else {
        $_SESSION['status'] = "Registration failed.";
        header("Location: register.php");
        exit();
    }
}

?>
