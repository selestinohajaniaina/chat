<?php
session_start();
$username=$_SESSION["username"];
$idUser=$_SESSION["idUser"];
$idFriend=2;
$friendname="alexandre";

if(empty($username)){
    header("location:../login/login.php");
}
require('index.php');
?>

