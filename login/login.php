<?php
session_start();
if(!empty($_SESSION["username"])){
  header("location:../chat/chat.php");
}
require('index.php');
?>
