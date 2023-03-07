<form method="post">
                        <button type="submit" name="follow" class="bg-blue-500 w-[85px] active:bg-blue-600 text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                            Suivre
                        </button>
</form>

<?php
if(isset($_POST["follow"])){
    $insert = $db -> prepare("insert into followers (idOwner, idFollow) values (?,?)");
    $insert -> execute([$id_profile,$idUser]);
    header("location:profil?idUser=$id_profile");
}
?>