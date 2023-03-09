<?php
    
    $delet = $db -> prepare("DELETE FROM likepost WHERE (idLike=:id_like)");
    $delet -> execute([
        "id_like"=>$idLike
    ]);
?>
<script>
    document.location.href="../post?id_post=<?=$post_id?>";
</script>