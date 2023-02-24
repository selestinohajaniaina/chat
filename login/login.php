<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/tailwind.min.css">
    <script src="../css/tailwind.min.js"></script>
</head>
<body>
    <!-- component -->
<div class="bg-yellow-400 h-screen overflow-hidden flex items-center justify-center"id="contener">
  <div class="bg-white lg:w-5/12 md:6/12 w-10/12 shadow-3xl">
    <div class="bg-gray-800 absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-full p-4 md:p-8">
      <svg width="32" height="32" viewBox="0 0 24 24" fill="#FFF">
        <path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/>
      </svg>
    </div>
    <form class="p-12 md:p-24" method="post">
      <div class="flex items-center text-lg mb-6 md:mb-8">
      <svg width="24" viewBox="0 0 24 24" fill="#000" class="absolute ml-3">
        <path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"></path>
      </svg>
        <input type="email" name="email" class="bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full" placeholder="email" />
      </div>
      <div class="flex items-center text-lg mb-6 md:mb-8">
        <svg class="absolute ml-3" viewBox="0 0 24 24" width="24">
          <path d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z"/>
        </svg>
        <input type="password" name="password" class="bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full" placeholder="Password" />
      </div>
      <input type="submit" value="Login" class="bg-gradient-to-b from-gray-700 to-gray-900 font-medium p-2 md:p-4 text-white uppercase w-full" name="login">
      <div class="text-center">
      <a href="../sigin" class="text-blue-500">create account</a>
      </div>
    </form>
    <div class="flex items-center justify-center">
    <span id="error"></span>
    </div>
  </div>
 </div>
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