<h6>creer une publication avec image</h6>

        <form method="post" enctype="multipart/form-data">
        <textarea name="legende" id="title" cols="30" rows="5"></textarea>
        <div class="img"></div>
            <input type="file" name="imagepost" id="image_post" value="ajouter une image"><br>
            <input type="submit" value="publier" name="btn_post" onclick="g();">
            <input type="button" value="Annuler" onclick="g();">
        </form>

<?php
//insert the post into db if button is setting

if(isset($_POST["btn_post"])){
        $image_post=$_FILES["imagepost"]["name"];
        $extension=substr(strrchr($image_post,"."),1);
        echo($extension);
}


?>