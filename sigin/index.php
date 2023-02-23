<?php
session_start();
if(!empty($_SESSION["idUser"])){
    header("location:../chat");
  }
require('sigin.php');
?>
