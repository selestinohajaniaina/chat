<?php

//calling db

require('../db.php');


//calling session

session_start();

// getting session variable

$idUser=$_SESSION["idUser"];
/* $username=$_SESSION["username"];*/



// including the created post

require("post.php");

?>