<?php
if(isset($_POST["creatpost"])){
    ?>
    <dialog class="demo-dialog" style="border-radius: 15px;">
        <h6>creer une publication avec image</h6>

        <form method="post" enctype="multipart/form-data">
        <textarea name="legende" id="title" cols="30" rows="5"></textarea>
        <div class="img"></div>
            <input type="file" name="imagepost" id="image_post" value="ajouter une image"><br>
            <input type="submit" value="publier" name="btn_post" onclick="g();">
            <input type="button" value="Annuler" onclick="g();">
        </form>
        
    </dialog>
    <script>
        function f(){
            const dialog = document.querySelector('.demo-dialog');
            dialog.showModal();
        }
        f();
        function g(){
            const dialog = document.querySelector('.demo-dialog');
            dialog.close();
        }
    </script>
    <?php
}
?>