<?php

//including db

require('../db.php');

//selecting to db and count if it exist

$select=$db->prepare("select * from user where email='$email'");
$select->execute();
$nbrExist=$select->rowCount();
$fetch=$select->fetch();

//test if selected exist

if($nbrExist>0){

    $dbPassword=$fetch["password"];
    $dbId=$fetch["idUser"];
    // echo $password;

        if((password_verify($dbPassword,$password))){
            $_SESSION["idUser"]=$dbId;
            // $_SESSION["username"]=$username;
            header("location:../accueil");
        }else{
            ?>
                <script>
                    let error = document.querySelector("#error");
                    error.innerHTML="votre mots de passes est incorrect";
                    error.setAttribute("class","text-sm text-red-500 bg-red-200");
                </script>
            <?php
        }
}else{
    
    ?>
      <script>
          let error = document.querySelector("#error");
        error.innerHTML="ce compte n'existe pas, veillez creer";
        error.setAttribute("class","text-sm text-blue-500 bg-blue-200");
      </script>
    <?php

}

?>