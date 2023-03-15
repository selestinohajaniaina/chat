<?php
    if(isset($_GET["update"])){
        $new_name = $_GET["new_name"];
        $new_mail = $_GET["new_mail"];
        $new_password = $_GET["new_password"];
        $new_confirm = $_GET["new_confirm"];
        $new_pdp = $_FILES["new_pdp"]["name"];
        $new_pdc = $_FILES["new_pdc"]["name"];
        echo `$new_name $new_mail $new_password $new_confirm $new_pdp $new_pdc`;
        echo 'ok';
    }
?>