<?php
$idUser=$_GET["iduser"];
$selection = $connection -> prepare("SELECT * FROM information WHERE id= $idUser");
$selection->execute();
$fetch=$selection->fetch();
$prenom = $fetch["prenom"];
$nom = $fetch["nom"];
$photo = $fetch["photo"];
if(isset($_POST["btn_post"])){
            $legende=$_POST["legende"];
            $image_post=$_FILES["imagepost"]["name"];
            $upload="picture/".$image_post;
            
        $insertion = $connection -> prepare("INSERT INTO publication (auteur, legende, image) VALUES (:post_autor, :post_legende, :post_image )");
        $insertion -> execute([
            "post_autor"=>$idUser,
            "post_legende"=>$legende,
            "post_image"=>$upload
        ]);
        $newUpload="../".$upload;
        move_uploaded_file($_FILES["imagepost"]["tmp_name"],$newUpload);
        header("location:index.php?prenom=$prenom&iduser=$idUser");
        }
