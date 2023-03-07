<?php
    $selectf = $db -> prepare("SELECT * FROM followers WHERE (idOwner=$id_profile AND idFollow=$idUser)");
    $selectf -> execute();
    $isHave = count($selectf -> fetchAll());

    if($isHave>0){
        require("unfollow.php");
    }else{
        require("follow.php");
    }
    ?>