<?php

    $email_admin = "kelessotom@gmail.com";
    $objet = "Contact via le site elio";
    
    $_POST["envoyer"];

    if (isset($_POST["envoyer"]) && !empty($_POST["envoyer"])){
        if(isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["message"]) && !empty($_POST["message"])){


        $message = $_POST["message"];
        $headers = 'From: '. $_POST["email"] . "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'content-type: text/html; charset=utf-8';
        if(mail($email_admin,$objet,$message,$headers))  {
                return header("location:index.php?success");
            }

 }}header("location:index.php?error");




?>