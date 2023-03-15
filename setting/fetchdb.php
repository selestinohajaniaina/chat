<?php

//pselecting to db and count if it exist

$pselect=$db->prepare("select * from user where idUser='$idUser'");
$pselect->execute();
$nbrExist=$pselect->rowCount();
$pfetch=$pselect->fetch();
$username=$pfetch["username"];
$email=$pfetch["email"];
$password=$pfetch["password"];

//selecting photo (pdp)
$pdpSelect=$db->prepare("select * from pdp where idUser='$idUser'");
$pdpSelect->execute();
$pdpFetch=$pdpSelect->fetch();
if(empty($pdpFetch["photo"])) $pdp="pdp.jpg";
else $pdp=$pdpFetch["photo"];

//selecting photo (pdc)
$pdcSelect=$db->prepare("select * from pdc where idUser='$idUser'");
$pdcSelect->execute();
$pdcFetch=$pdcSelect->fetch();
if(empty($pdcFetch["photo"])) $pdc="pdc.png";
else $pdc=$pdcFetch["photo"];

?>