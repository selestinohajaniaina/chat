<?php
//including db

require('../db.php');

session_start();
$username=$_SESSION["username"];
$idUser=$_SESSION["idUser"];

if(empty($username)){
    header("location:../login/");
}
require('chat.php');
?>