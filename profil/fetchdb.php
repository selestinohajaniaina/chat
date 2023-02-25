<?php

$id_profile=$idUser;

//pselecting to db and count if it exist

$pselect=$db->prepare("select * from user where idUser='$id_profile'");
$pselect->execute();
$nbrExist=$pselect->rowCount();
$pfetch=$pselect->fetch();
$username=$pfetch["username"];
$email=$pfetch["email"];

//selecting photo (pdp)
$pdpSelect=$db->prepare("select * from pdp where idUser='$id_profile'");
$pdpSelect->execute();
$pdpFetch=$pdpSelect->fetch();
if(empty($pdpFetch["photo"])) $pdp="pdp.jpg";
else $pdp=$pdpFetch["photo"];

//selecting photo (pdc)
$pdcSelect=$db->prepare("select * from pdc where idUser='$id_profile'");
$pdcSelect->execute();
$pdcFetch=$pdcSelect->fetch();
if(empty($pdcFetch["photo"])) $pdc="pdc.png";
else $pdc=$pdcFetch["photo"];
?>