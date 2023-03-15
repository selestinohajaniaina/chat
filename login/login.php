<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
    <script src="../lottie/lottie-player.js"></script>
</head>
<body>

<section class="bg-gray-50">
  <!-- first lottie files -->
  <div class="w-1/4 absolute top-[20%] hidden md:block">
  <lottie-player src="../lottie/json/lf20_lgvdhvlz.json" background="transparent"  speed="1"  loop autoplay>
  </div>
  
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      
      <div class="w-full bg-white rounded-lg z-10 shadow-xl border-2 md:mt-0 sm:max-w-md xl:p-0 ">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-center text-gray-900 md:text-2xl ">
                  Login
              </h1>
              <form class="space-y-4 md:space-y-6" method="post">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 outline-none border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm  font-medium text-gray-900 ">Mots de passe</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 outline-none border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                  </div>
                  <div class="flex items-center justify-between">
                      
                      <a href="#" class="text-sm font-medium text-primary-600 hover:underline">Mot de passe oublié?</a>
                  </div>
                  <button type="submit" name="login" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
                  <p class="text-sm font-light text-gray-500">
                  Vous n'avez pas encore de compte? <a href="../sigin" class="font-medium text-primary-600 hover:underline">Sign up</a>
                  </p>
              </form>
          </div>
          <div class="flex items-center justify-center">
            <span id="error"></span>
          </div>
      </div>
  </div>
  <!-- second lottie files  -->
  <div class="w-1/3 absolute right-0 top-[10%] hidden md:block">
  <lottie-player src="../lottie/json/lf20_jcikwtux.json" background="transparent"  speed="1"  loop autoplay>
  </div>

</section>

<?php
  if(isset($_POST["login"])){
    $email=$_POST["email"];
    $password=$_POST["password"];
    if(empty($email)||empty($password)){
      ?>
      <script>
        let error = document.querySelector("#error");
        error.innerHTML="veillez remplir tous les champs";
        error.setAttribute("class","text-sm text-green-500 bg-green-200");
      </script>
      <?php
    }else{
      $password=password_hash($password,PASSWORD_BCRYPT);
      require('back.php');
    }
  }
 ?>
</body>
</html>