<?php
require('../db.php');

session_start();
// $username=$_SESSION["username"];
$idUser=$_SESSION["idUser"];
if(empty($idUser)){
    header("location:../login/");
}else{
    require('fetchdb.php');
    require('profil.php');
}
?>