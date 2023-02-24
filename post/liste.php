<?php

//selection de publication

$postSelect = $db -> prepare("SELECT * FROM post ORDER BY id_post DESC");
$postSelect->execute();
$fetch=$postSelect->fetchAll();
$listeNbr = count($fetch);

//list of all post include at <class=table>

for($i=0;$i<$listeNbr;$i++){
    ?>
<div class="contenaire">
    <div class="table">
        <?php
            $post_id=$fetch[$i]["id_post"];
            $post_img=$fetch[$i]["photo"];
            $post_legende=$fetch[$i]["legend"];
            $post_id_auteur=$fetch[$i]["idOwner"];

            //la cache du bouton message
            if($idUser==$post_id_auteur){
                ?>
                <style>
                    <?=".msg$post_id_auteur"?>{
                        visibility:hidden;
                    }
                </style>
                <?php
            }
            
            //selection d'utilisateur du compte

            $selecUser=$db ->prepare("SELECT * FROM user WHERE idUser=$post_id_auteur");
            $selecUser->execute();
            $fetchUser=$selecUser->fetch();
            $nameUserPost = $fetchUser["username"];
            
            // $imgUserPost = $fetchUser["photo"];
            
            ?>

            <!-- pdp + nom + prenom de proprietaire -->

            <div class="th">
            <h5><?=$nameUserPost?></h5>
            </div>

            <!-- image + legende du publication -->
            
            <div class="td">
            <p class="legende"><?=$post_legende?></p>
            <img src="../img/post/<?=$post_img?>" title="<?=$post_id?>"/>
            
            </div>
</div>
</div>
<?php
}


?>