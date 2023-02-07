<?php

$insert=$db->prepare("insert into `message`(`idUser`, `msg`) values(?,?)");
$insert->execute([$idUser, $textMsg]);
echo "sent ";
// header('location:../login');
?>
<script>
    document.location.href="../";
</script>