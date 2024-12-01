<?php

include "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["e"])) {

    $email = $_POST["e"];

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "'");
    $admin_num = $admin_rs->num_rows;

    if ($admin_num > 0) {

        $code = uniqid();

        Database::iud("UPDATE `admin` SET `vcode`='" . $code . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'janindumagamage100@gmail.com';
        $mail->Password = 'lnosawhylowkabzs';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('janindumagamage100@gmail.com', 'Admin Verification');
        $mail->addReplyTo('janindumagamage100@gmail.com', 'Admin Verification');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'TechHeaven Admin Login Verification Code';
        $bodyContent = '
        
    
    <div class="email-container justify-content-center">
        <h1>Log in to TechHeaven Admin Panel</h1>
        <p>Welcome back! Enter this code to log in:</p>
        <h1 style="color:green;">' . $code . '</h1>
        <hr>
        <p class="notice">
            If this is not you, kindly ignore this email.
        </p>
        <footer>
            <p>
                TechHeaven®, No.25, Kandy Road, Kadawatha<br>
                ABN 97 718 738 28 | <a href="#">Privacy Policy</a>
            </p>
        </footer>
    </div>';

        
        
        
        
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed.';
        } else {
            echo 'Success';
        }
    } else {
        echo ("You are not a valid user.");
    }
} else {
    echo ("Email field should not be empty.");
}
