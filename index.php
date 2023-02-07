<?php
session_start();
if(empty($_SESSION["username"])){
    header("location:login/login.php");
}else{
    header("location:chat/chat.php");
}
?>