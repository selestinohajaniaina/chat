<?php

//including db

require('../db.php');

//clicking at send

if(isset($_GET["send"])){
    if(empty($textMsg)){
        ?>
        <script>alert();</script>
        <?php
    }else{
            //chaging variable
            $textMsg=$_GET["textMsg"];

    }
}
?>