<?php
try{
    $db=new PDO("mysql:host=localhost;dbname=chat","root","");
}
catch(PDOException $e){
    echo "error $e";
}
?>