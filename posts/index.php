<?php

//calling db

require('../db.php');


//calling session

session_start();

// getting session variable

$idUser=$_SESSION["idUser"];
/* $username=$_SESSION["username"];*/

if(empty($idUser)){
    header("location:../login/");
}else{
    
    // including the created post
    
    require("publication.php");
    
}


?>