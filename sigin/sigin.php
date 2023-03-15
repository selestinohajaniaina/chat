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
  <lottie-player src="../lottie/json/lf20_yqyt4zdn.json" background="transparent"  speed="1"  loop autoplay>
  </div>


  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      
      <div class="w-full bg-white rounded-lg shadow-xl border-2 md:mt-0 sm:max-w-md xl:p-0 z-10">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-center text-gray-900 md:text-2xl ">
              Registre
              </h1>
              <form class="space-y-4 md:space-y-6" method="get">

                  <div>
                      <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Utilisateur</label>
                      <input type="text" name="username" id="username" class="bg-gray-50 outline-none border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="your name">
                  </div>

                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 outline-none border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com">
                  </div>

                  <div class="sm:flex justify-between">
                  <div>
                      <label for="password" class="block mb-2 text-sm  font-medium text-gray-900 ">Mots de passe</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 outline-none border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                  </div>

                  <div>
                      <label for="confirm" class="block mb-2 text-sm  font-medium text-gray-900 ">Confirme</label>
                      <input type="password" name="confirm" id="confirm" placeholder="••••••••" class="bg-gray-50 outline-none border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                  </div>

                  </div>
                  

                  <button type="submit" name="sigin" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign up</button>

                  <p class="text-sm font-light text-gray-500">
                  Do you have an account? <a href="../login" class="font-medium text-primary-600 hover:underline">Login</a>
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
  <lottie-player src="../lottie/json/lf20_dsmgi54l.json" background="transparent"  speed="1"  loop autoplay>
  </div>
</section>

<?php
  if(isset($_GET["sigin"])){
    $username=$_GET["username"];
    $password=$_GET["password"];
    $confirm=$_GET["confirm"];
    $email=$_GET["email"];
    if(empty($username)||empty($password)||empty($confirm)||empty($email)){
      ?>
      <script>
        let error = document.querySelector("#error");
        error.innerHTML="veillez remplir tous les champs";
        error.setAttribute("class","text-sm text-green-500 bg-green-200");
      </script>
      <?php
    }else if($password!=$confirm){
      ?>
      <script>
        let error = document.querySelector("#error");
        error.innerHTML="cofirme doit etre egale a mot de passe";
        error.setAttribute("class","text-sm text-blue-500 bg-green-200");
      </script>
      <?php
    }else{
      // $pass=password_hash($password,PASSWORD_BCRYPT);
      require('back.php');
    }
  }
 ?>
</body>
</html>