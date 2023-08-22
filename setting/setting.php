<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/output.css">
    <script src="../lottie/lottie-player.js"></script>
</head>
<body>
    <?php
    require('../navbar.php');
    require('../side/sidebar.php');
    require("fetchdb.php");
    ?>
    <form method="post">
    <div class="flex bg-gray-50 items-center justify-center  mt-2 sm:absolute sm:right-0 sm:w-[80%] w-full">
  <div class="grid bg-white rounded-lg border-solid border-2 shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
    <div class="flex justify-center py-4">
      <div class="flex justify-end items-end rounded-full border-2 border-blue-400 w-[140px] h-[140px] overflow-hidden shadow-xl" id="newImg">
        <div class="w-10 h-10 absolute bg-blue-500 rounded-full">
          <input type="file" name="new_pdp" accept="image/*" id="pdp" title="choisir une image" class="absolute overflow-hidden opacity-0 z-10 h-full w-full cursor-pointer" onchange="changepdp();">
          <lottie-player src="../lottie/json/lf20_6niurjte.json" class="absolute" background="transparent"  speed="1"  loop autoplay>
        </div>
        </lottie-player>
      </div>
    </div>
    <div class="flex justify-center">
      <div class="flex text-center">
        <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Modification du profil</h1>
      </div>
    </div>

    <div class="grid grid-cols-1 mt-5 mx-7">
      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Utilisateur</label>
      <input class="py-2 px-3 rounded-lg border-2 border-blue-400 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" name="new_name" value="<?=$username?>" type="text" placeholder="Utilisateur" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
      <div class="grid grid-cols-1">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Mots de passe</label>
        <input class="py-2 px-3 rounded-lg border-2 border-blue-400 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" name="new_password" type="password" value="<?=$password?>" placeholder="Mots de passe" />
      </div>
      <div class="grid grid-cols-1">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Confirme</label>
        <input class="py-2 px-3 rounded-lg border-2 border-blue-400 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" name="new_confirm" type="password" value="<?=$password?>" placeholder="Confirme" />
      </div>
    </div>

    <div class="grid grid-cols-1 mt-5 mx-7">
      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">email</label>
      <input class="py-2 px-3 rounded-lg border-2 border-blue-400 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" name="new_mail" type="mail" value="<?=$email?>" placeholder="exemple@gmail.com" />
    </div>

    <div class="grid grid-cols-1 mt-5 mx-7">
      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">couverture</label>
        <div class='flex items-center justify-center w-full'>
            <label class='flex flex-col border-4 cursor-pointer border-dashed w-full h-32 hover:bg-gray-100 hover:border-blue-400 group' id="pdc">
                <div class='flex flex-col items-center justify-center pt-7'>
                  <svg class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                  <p class='lowercase text-sm text-gray-400 group-hover:text-blue-600 pt-1 tracking-wider cursor-pointer'>Select a photo</p>
                </div>
              <input type='file' class="hidden" id="imgPdc" onchange="changepdc();" name="new_pdc" accept="image/*"/>
            </label>
        </div>
    </div>

    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
      <a href="../" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Annuler</a>
      <input type="submit" name="update" class='w-auto bg-blue-500 hover:opacity-80 rounded-lg shadow-xl font-medium text-white px-4 py-2' value='Modifier'>
    </div>

  </div>
</div>
</form>
<?php 
// require('insert.php');
if(isset($_POST["update"])){
  $new_name = $_POST["new_name"];
        $new_mail = $_POST["new_mail"];
        $new_password = $_POST["new_password"];
        $new_confirm = $_POST["new_confirm"];
        $new_pdp = !empty($_FILES["new_pdp"]["name"]) ? $_FILES["new_pdp"]["name"] : $pdp;
        $new_pdc = !empty($_FILES["new_pdc"]["name"]) ? $_FILES["new_pdc"]["name"] : $pdc;
  echo `$new_name $new_mail $new_password $new_confirm $new_pdp $new_pdc`;
  echo 'ok';
}
?>
<style>
  #pdc{
    background-image:url('../img/covert/<?=$pdc?>');
    background-position:center;
    background-size:cover;
    background-repeat:no-repeat;
  }
  #newImg{
    background-image:url('../img/profil/<?=$pdp?>');
    background-position:center;
    background-size:cover;
    background-repeat:no-repeat;
  }
</style>
<script>
  function changepdc(){
    let file = document.querySelector('#imgPdc').files[0];
    let pdc = document.querySelector('#pdc');
    var reader  = new FileReader();
            reader.onload = function(e)  {
            var image = document.createElement("img");
            image.src = e.target.result;
            pdc.style.backgroundImage=`url(${image.src})`;
            }
      reader.readAsDataURL(file);
  }
  function changepdp(){
    let file = document.querySelector('#pdp').files[0];
    let newImg = document.querySelector('#newImg');
    var reader  = new FileReader();
            reader.onload = function(e)  {
              var image = document.createElement("img");
            image.src = e.target.result;
            newImg.style.backgroundImage=`url(${image.src})`;
            }
      reader.readAsDataURL(file);
  }
</script>

</body>
</html>