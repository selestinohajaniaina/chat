<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux</title>
    <link rel="stylesheet" href="../css/output.css">
    <style>
        #Jeux{
            background-color: rgb(17 24 39);
        }
    </style>
</head>
<body>
<?php
    require('../navbar.php');
    require('../side/sidebar.php');
?>
<div class="profile-page sm:absolute sm:right-0 sm:w-[80%] w-full flex flex-wrap p-4 font-bold">

    <a href="./mario/" target="_blank" class="m-2">
        <div class="bg-red-500 relative w-fit rounded-[10px] shadow-lg overflow-hidden transition-all hover:-translate-y-2">
            <p class="w-full text-center p-2 absolute bottom-0 bg-gray-50 opacity-70">Super Mario</p>
            <img src="img/mario.jpg"  />
        </div>
    </a>

    <a href="./dino/" target="_blank" class="m-2">
        <div class="bg-red-500 relative w-fit rounded-[10px] shadow-lg overflow-hidden transition-all hover:-translate-y-2">
            <p class="w-full text-center p-2 absolute bottom-0 bg-gray-50 opacity-70">Dinosaure Jump</p>
            <img src="img/dino.jpg"  />
        </div>
    </a>

    <a href="./tictac/" target="_blank" class="m-2">
        <div class="bg-red-500 relative w-fit rounded-[10px] shadow-lg overflow-hidden transition-all hover:-translate-y-2">
            <p class="w-full text-center p-2 absolute bottom-0 bg-gray-50 opacity-70">Tictactoe toogle</p>
            <img src="img/tictac.jpg"  />
        </div>
    </a>
    
</div>
</body>
</html>