<?php
    if(isset($_POST["update"])){
        $new_name = $_POST["new_name"];
        $new_mail = $_POST["new_mail"];
        $new_password = $_POST["new_password"];
        $new_confirm = $_POST["new_confirm"];
        $new_pdp = !empty($_FILES["new_pdp"]["name"]) ? $_FILES["new_pdp"]["name"] : $pdp;
        $new_pdc = !empty($_FILES["new_pdc"]["name"]) ? $_FILES["new_pdc"]["name"] : $pdc;
        echo `$new_name $new_mail $new_password $new_confirm $new_pdp $new_pdc`;
        echo 'ok';
    }
?>