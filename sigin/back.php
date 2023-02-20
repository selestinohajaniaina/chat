<?php

//including db

require('../db.php');

$select=$db->prepare("select * from user where (email='$email' and username='$username' and password='$password')");
$select->execute();
$nbrExist=$select->rowCount();


//test if selected exist


if($nbrExist>0){
    ?>
                <script>
                    let error = document.querySelector("#error");
                    error.innerHTML="Ce compte est deja existé!";
                    error.setAttribute("class","text-sm text-blue-500 bg-red-200");
                    </script>
            <?php
}else{
    
    //inserting to db 
    
    $insert=$db->prepare("INSERT INTO user(email, username, password) VALUES (email='$email', username='$username', password='$password')");
    $insert->execute();
    
    //fetching idUser && selected
    $selectID=$db->prepare("select * from user where username='$username'");
    $selectID->execute();
    $fetchID=$select->fetch();
    $dbId=$fetchID["idUser"];

    $_SESSION["idUser"]=$dbId;
    $_SESSION["username"]=$username;
    // header("location:../chat/");
}
// $fetch=$select->
// header("location:../chat/chat.php")
?>