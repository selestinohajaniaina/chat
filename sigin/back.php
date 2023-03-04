<?php

//including db

require('../db.php');
    
    //inserting to db 
    $user=[$email, $username, $password];
    $insert=$db->prepare("INSERT INTO user(email, username, password) VALUES (?,?,?)");
    $insert->execute($user);
    
    //fetching idUser && selected
    $selectID=$db->prepare("select * from user where email='$email'");
    $selectID->execute();
    $fetchID=$selectID->fetch();
    $dbId=$fetchID["idUser"];

    $_SESSION["idUser"]=$dbId;
    $_SESSION["username"]=$username;
    header("location:../chat");
    
?>