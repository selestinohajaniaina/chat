<?php
require('../db.php');

session_start();
// $username=$_SESSION["username"];
$idUser=$_SESSION["idUser"];

require('fetchdb.php');
require('profil.php');
?>