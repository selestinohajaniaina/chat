<?php
session_start();
if(!empty($_SESSION["username"])){
  header("location:../chat/");
}
require('login.php');
?>
