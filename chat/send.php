<?php


$insert=$db->prepare("insert into `message`(`idUser`, `msg`, `idFriend`) values(`$idUser`, `$textMsg`, `$idFriend`)");
$insert->execute();
?>