<?php

    // get all comments in db

    $selectPost = $db -> prepare("SELECT * FROM comment WHERE id_post=$post_id");
    $selectPost -> execute();
    $fetchPost=$selectPost->fetchAll();
    $nbrPost = count($fetchPost);

    //affiche les totales des commentaires s'il est superieur a zero

    if($nbrPost>0){
        ?>
        <span class="absolute left-[30%] font-bold text-gray-700">
            <?=$nbrPost?>
        </span>
        <?php
    }

?>

