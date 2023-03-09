<?php

//including random.php

require('random.php');

//insert the post into db if button is setting

if(isset($_POST["btn_post"])){

        
        if(empty($_POST["legende"])&&empty($_FILES["imagepost"]["name"])){
                ?>

                        <script>
                                // alerting if all input are empty
                                alert("Vous devez ajouter au moin le text a votre publication.");
                                // let err = document.querySelector("#err");
                                // err.innerHTML="Vous devez ajouter au moin le text a votre publication.";
                        </script>

                <?php
        }else{

                $legende=$_POST["legende"];
                $image_post=$_FILES["imagepost"]["name"];
                

        //change the file name

        $extension=substr(strrchr($image_post,"."),1);
        $image_post=getRandomString().".".$extension;
        
        if(empty($_FILES["imagepost"]["name"])){
                $image_post="";
        }

        $upload="../img/post/".$image_post;

        //date now
        $startTime = date("Y-m-d H:i:s");
        //add 3 hour to time
        $now = date('Y-m-d H:i:s',strtotime('+3 hour',strtotime($startTime)));

        move_uploaded_file($_FILES["imagepost"]["tmp_name"],$upload);

        //insert -> db , the post

        $insertion = $db -> prepare("INSERT INTO post (idOwner, legend, photo, date) VALUES (:post_autor, :post_legende, :post_image, :post_date)");
        $insertion -> execute([
            "post_autor"=>$idUser,
            "post_legende"=>$legende,
            "post_image"=>$image_post,
            "post_date"=>$now
        ]);
        
        ?>

<script>

        // header("location:../post")

    document.location.href = "../posts";

</script>

        <?php

}
}


?>