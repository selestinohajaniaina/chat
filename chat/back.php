<?php


//clicking at send

if(isset($_GET["send"])){
    $textMsg=$_GET["textMsg"];
    if(empty($textMsg)){
    }else{
        require('send.php');
    }
}
?>