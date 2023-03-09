<form method="post">

                <button type="submit" name="unfollow" class="bg-gray-500 active:bg-gray-600 text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                    Suivi(e)
                </button>
</form>

<?php
if(isset($_POST["unfollow"])){
    $delete = $db -> prepare("DELETE FROM followers WHERE (idOwner=$id_profile AND idFollow=$idUser)");
    $delete -> execute();
    // header("location:profil?idUser=$id_profile");
    ?>
    <script>
        document.location.href ="../profil?idUser=<?=$id_profile?>";
    </script>
    <?php
}
?>