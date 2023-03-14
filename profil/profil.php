
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$username?></title>
    <link rel="stylesheet" href="../css/tailwind.css">
    <link rel="stylesheet" href="../css/output.css">
</head>
<style>
  #username{
        background:rgb(55, 65, 81);
    }
</style>
<body>

<?php 
require('../navbar.php');
require('../side/sidebar.php');
?>



<main class="profile-page sm:absolute sm:right-0 sm:w-[80%] w-full">
  <section class="relative block h-500-px">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('../img/covert/<?=$pdc?>');
          ">
    </div>
    <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
      <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </section>
  <section class="relative py-16 bg-blueGray-200">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
          <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
              <div class="relative ">
                <img src="../img/profil/<?=$pdp?>" class="hover:shadow-lg hover:shadow-indigo-50 cursor-pointer shadow-xl rounded-full h-auto align-middle border-solid border-2 border-white absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
              <div class="py-6 px-3 mt-32 sm:mt-0 flex justify-between">
              
                <?php if(!empty($_GET["idUser"])&&$_GET["idUser"]!=$idUser) require('follows/bouton.php'); else require('follows/edit.php');?>
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 lg:order-1">
              <div class="flex justify-center py-4 lg:pt-4 pt-8">
                <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                    <?php
                      $select_nbr = $db -> prepare("SELECT * FROM followers WHERE (idOwner=$id_profile)");
                      $select_nbr -> execute();
                      $nbrFollow = count($select_nbr -> fetchAll());
                      echo $nbrFollow;
                    ?>
                  </span><span class="text-sm text-blueGray-400">Suivie(s)</span>
                </div>
                <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span><span class="text-sm text-blueGray-400">Photos</span>
                </div>
                <div class="lg:mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                    <?php

                      //selection de publication

                      $postSelect = $db -> prepare("SELECT * FROM post WHERE idOwner=:idUser ORDER BY id_post DESC");
                      $postSelect->execute([
                          "idUser"=>$id_profile,
                      ]);
                      $fetch=$postSelect->fetchAll();
                      $listeNbr = count($fetch);
                      echo $listeNbr;
                    ?>
                  </span><span class="text-sm text-blueGray-400">Publication(s)</span>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-12">
            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700">
              <?=$username?>
            </h3>
            <div class="flex justify-center text-sm leading-normal mt-5 mb-2 text-blueGray-400 lowerercase">
              <svg width="24" viewBox="0 0 24 24" fill="#94a3b8" >
                <path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"></path>
              </svg>
              &ensp;
              <?=$email?>
            </div>
            <div class="mb-2 text-blueGray-600 mt-10">
              <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>Solution Manager - Creative Tim Officer
            </div>
            <div class="mb-2 text-blueGray-600">
              <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>University of Computer Science
            </div>
          </div>
          <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
            <div class="flex flex-wrap justify-center">
              <div class="w-full lg:w-9/12 px-4">
                <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                  An artist of considerable range, Jenna the name taken by
                  Melbourne-raised, Brooklyn-based Nick Murphy writes,
                  performs and records all of his own music, giving it a
                  warm, intimate feel with a solid groove structure. An
                  artist of considerable range.
                </p>
                <a href="#pablo" class="font-normal text-pink-500">Show more</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">
  <?php require("liste_post.php")?>
</footer>
  </section>
</main>

</body>
</html>