<?php
require('../db.php');

session_start();

// $username=$_SESSION["username"];
$idUser=$_SESSION["idUser"];

// including the list of post

require("liste_post.php");

?>