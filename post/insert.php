<?php

//including random.php

require('random.php');

//insert the post into db if button is setting

if(isset($_POST["btn_post"])){

        
        if(empty($_POST["legende"])&&empty($_FILES["imagepost"]["name"])){
                ?>

                        <script>
                                // alerting if all input are empty
                                alert("vide");
                        </script>

                <?php
        }else{

                $legende=$_POST["legende"];
                $image_post=$_FILES["imagepost"]["name"];
                

        //change the file name

        $extension=substr(strrchr($image_post,"."),1);
        $image_post=getRandomString().".".$extension;
        $upload="../img/post/".$image_post;

        //insert -> db , the post
            
        $insertion = $db -> prepare("INSERT INTO post (idOwner, legend, photo) VALUES (:post_autor, :post_legende, :post_image )");
        $insertion -> execute([
            "post_autor"=>$idUser,
            "post_legende"=>$legende,
            "post_image"=>$image_post
        ]);
        
        move_uploaded_file($_FILES["imagepost"]["tmp_name"],$upload);

        ?>

<script>

        // header("location:../post")

    document.location.href = "../post";

</script>

        <?php

}
}


?>