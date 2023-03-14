<?php
    require('../../db.php');

    session_start();

    $idUser=$_SESSION["idUser"];
    $follower_id=$_GET["id_f"];

    $insert = $db -> prepare("insert into followers (idOwner, idFollow) values (?,?)");
    $insert -> execute([$follower_id,$idUser]);
    // header("location:profil?idUser=$id_profile");
    ?>
    <script>
        document.location.href ="../";
    </script>
