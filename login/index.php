<?php
session_start();
if(!empty($_SESSION["idUser"])){
  header("location:../accueil/");
}
require('login.php');
?>
