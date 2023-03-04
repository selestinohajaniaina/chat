<?php
    $insert = $db -> prepare("INSERT INTO likepost(id_post, idUser) VALUES(:id_post, :idUser)");
    $insert -> execute([
        "id_post"=>$post_id,
        "idUser"=>$idUser,
    ]);
?>
<script>
    document.location.href="../post?id_post=<?=$post_id?>";
</script>