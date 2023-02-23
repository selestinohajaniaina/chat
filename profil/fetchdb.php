<?php

//pselecting to db and count if it exist

$pselect=$db->prepare("select * from user where idUser='$idUser'");
$pselect->execute();
$nbrExist=$pselect->rowCount();
$pfetch=$pselect->fetch();
$username=$pfetch["username"];
$email=$pfetch["email"];
?>