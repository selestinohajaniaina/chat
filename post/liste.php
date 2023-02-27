<?php

//selection de publication

$postSelect = $db -> prepare("SELECT * FROM post ORDER BY id_post DESC");
$postSelect->execute();
$fetch=$postSelect->fetchAll();
$listeNbr = count($fetch);

//list of all post include at <class=table>

for($i=0;$i<$listeNbr;$i++){
    ?>
<div class="bg-gray-300">
    <div class="m-1 bg-gray-700 w-fit">
        <?php
            $post_id=$fetch[$i]["id_post"];
            $post_img=$fetch[$i]["photo"];
            $post_legende=$fetch[$i]["legend"];
            $post_id_auteur=$fetch[$i]["idOwner"];
            $post_date=$fetch[$i]["date"];

            
            
            //selection d'utilisateur du compte

            $selecUser=$db ->prepare("SELECT * FROM user WHERE idUser=$post_id_auteur");
            $selecUser->execute();
            $fetchUser=$selecUser->fetch();
            $nameUserPost = $fetchUser["username"];
            
            //selection de pdp d'utilisateur

            $pdpOwner=$db ->prepare("SELECT * FROM pdp WHERE idUser=$post_id_auteur");
            $pdpOwner->execute();
            $fetchpdp=$pdpOwner->fetch();

            
            ?>

            <!-- pdp + nom + prenom de proprietaire -->

            <div class="th flex items-center bg-orange-300 w-fit">
                <?php

                    if(empty($fetchpdp["photo"])){

                        ?>

                            <div class="bg-yellow-200 w-12 h-12 flex justify-center items-center"><?=strtoupper($nameUserPost[0])?></div>
                            
                            <?php

                    }else{

                        $pdpUserPost = $fetchpdp["photo"];

                        ?>

                            <img src="../img/profil/<?=$pdpUserPost?>" class="w-12" />

                        <?php
                    }
                ?>


            <div class="w-fit bg-lime-400">
                <h5><?=$nameUserPost?></h5>
            <span><?=$post_date?></span>
            </div>
            </div>

            <!-- image + legende du publication -->
            
            <div class="td bg-red-400 ">
            <p class="legende bg-green-300 w-fit"><?=$post_legende?></p>
            <img src="../img/post/<?=$post_img?>" title="<?=$post_img?>" class="w-2/5" />
            
            </div>
    </div>
</div>
<?php
}


?>