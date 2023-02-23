<?php

//selection de publication

$postSelect = $db -> prepare("SELECT * FROM post ORDER BY id_post DESC");
$postSelect->execute();
$postFetch=$postSelect->fetchAll();
$listeNbr = count($postFetch);

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
            <img src="../<?=$post_img?>" title="<?=$post_id?>"/>
            
            </div>
            <!-- barre du commentaire -->
            <div class="comments">
                <form method="post">
                <input type="text" name="commentaire" id="comentaire" placeholder="envoyer votre comentaire..." autocomplete="off" required>
                <input type="submit" value="" name="valider" style="visibility:hidden;">
                </form>
                <?php
                $newID=$post_id;
                if(isset($_POST["valider"])){
                    $commentaire=$_POST["commentaire"];
                    header("location:../commentaire/index.php?iduser=$idUser&rangpost=$newID&coms=$commentaire");
                }
                ?>
            </div>
</div>
</div>
<?php
}
?>