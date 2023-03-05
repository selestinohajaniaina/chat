<?php

    //get all comments in db

    for($i=0;$i<$nbrPost;$i++){
        $idOwner = $fetchPost[$i]["idUser"];
        $texte_coms = $fetchPost[$i]["texte"];
        $date_coms = $fetchPost[$i]["date_coms"];
        echo "$idOwner <br> $texte_coms <br>  $date_coms";
    }

?>