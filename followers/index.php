<?php
//including db

require('../db.php');

session_start();
// $username=$_SESSION["username"];
$idUser=$_SESSION["idUser"];

if(empty($idUser)){
    header("location:../login/");
}else{
    require('follow.php');
}
?>