
<?php

    $selectLike= $db -> prepare("SELECT * FROM likepost WHERE (id_post=:id_post AND idUser=:idUser)");
    $selectLike->execute([
        "id_post"=>$post_id,
        "idUser"=>$idUser,
    ]);

    $fetchLike = $selectLike -> fetch();
    if(!empty($fetchLike["idLike"])){
        $idLike = $fetchLike["idLike"];

    }

    if(empty($idLike)){
        ?>
            <form method="post">
    <input type="submit" value="like" name="like">
</form>
        <?php
    }else{
        ?>
        <form method="post">
    <input type="submit" value="unlike" name="unlike">
</form>
        <?php
    }

if(isset($_POST["like"])){
    require("like.php");
}
if(isset($_POST["unlike"])){
    require("unlike.php");
}
?>