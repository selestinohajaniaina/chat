<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   
<?php 
    require("conversation.php"); 
?>
<form  method="get" class="flex justify-center">
   <input type="text" name="textMsg" id="textMsg" placeholder="Ecrivez quelque chose" autocomplete=off
   class="
        form-control
        block
        w-auto
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
      "
   >
   <input type="submit" name="send" id="send" value="send"
   class="
   inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out
   "
   >
</form>
<?php 
    require("back.php"); 
?>

    
    <a href="../disconnect/disconnect.php">Disconnect</a>
</body>
</html>