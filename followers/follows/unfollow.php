<?php
require('../../db.php');

session_start();

$idUser=$_SESSION["idUser"];
$follower_id=$_GET["id_f"];

    $follower_id=$_GET["id_f"];
    $delete = $db -> prepare("DELETE FROM followers WHERE (idOwner=$follower_id AND idFollow=$idUser)");
    $delete -> execute();
    // header("location:profil?idUser=$id_profile");
    ?>
    <script>
        document.location.href ="../";
    </script>
