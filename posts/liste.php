<?php

//selection de publication

$postSelect = $db -> prepare("SELECT * FROM post ORDER BY id_post DESC");
$postSelect->execute();
$fetch=$postSelect->fetchAll();
$listeNbr = count($fetch);

//list of all post 

?>
<div class="bg-gray-50 flex flex-col items-center">
<?php

for($i=0;$i<$listeNbr;$i++){
    ?>
<div class="bg-gray-100 rounded w-fit mt-2 shadow-xl ">
    <div class="m-3 w-fit">
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

            <div class="p-2 flex items-center bg-gray-200 rounded-t-2xl">
                <?php

                    if(empty($fetchpdp["photo"])){

                        ?>

                            <div class="rounded-3xl font-mono text-3xl bg-yellow-200 w-12 h-12 flex justify-center items-center border-solid border-4 border-gray-200"><?=strtoupper($nameUserPost[0])?></div>
                            
                            <?php

                    }else{

                        $pdpUserPost = $fetchpdp["photo"];

                        ?>

                            <img src="../img/profil/<?=$pdpUserPost?>" class="w-12 rounded-3xl border-solid border-4 border-gray-200" />

                        <?php
                    }
                ?>


            <div class="w-fit pl-1 flex flex-col">

                <h5>
                    <a href="../profil?idUser=<?=$post_id_auteur?>" class="capitalize font-bold hover:underline">
                    <?=$nameUserPost?>
                    </a>
                </h5>

                <span class=" font-thin text-gray-500 text-opacity-80 text-[0.6rem]"><?=$post_date?></span>

            </div>

            </div>

            <!-- text du publication -->

            <?php
                if(empty($post_img)){
                    ?>
                    <div>
            <p class="p-2 bg-gray-100 text-3xl max-w-lg text-center"><?=$post_legende?></p>
            </div>
                    <?php
                }else{
            ?>

            <!-- image + legende du publication -->
            
            <div>
            <p class="p-2 bg-gray-100 font-medium max-w-lg text-justify"><?=$post_legende?></p>
            <div class="rounded overflow-hidden">
            <img src="../img/post/<?=$post_img?>" id="post_<?=$post_id?>" title="<?=$post_img?>" class="w-132 cursor-pointer hover:scale-105 transition-all duration-500 ease-in-out" />
            </div>
            </div>
            <?php
                }
            ?>
            <div class="bg-gray-200 flex items-center mt-2 font-medium rounded">
                <div class="bg-slate-800">
                <!-- <a href="../post?id_post=16" class="w-full" style="background:gray;width:100%">Ecrir votre commentaire...</a> -->
                </div>
            </div>
    </div>
</div>

<?php
require("href.php");
}
?>

</div>