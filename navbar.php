<?php
  $select_photo = $db -> prepare("SELECT * FROM pdp WHERE idUser=$idUser");
  $select_photo -> execute();
  $fetch_photo = $select_photo -> fetch();

  $select_name = $db -> prepare("SELECT * FROM user WHERE idUser=$idUser");
  $select_name -> execute();
  $fetch_name = $select_name -> fetch();
  $symbole = $fetch_name["username"];
?>

<nav class="bg-gray-800 fixed w-full shadow-lg z-20">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
          <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
              <!-- Mobile menu button-->
              <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" id="btn_menu">
                <!-- <span class="sr-only">Open main menu</span> -->
                <!--
                  Icon when menu is closed.
      
                  Menu open: "hidden", Menu closed: "block"
                -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!--
                  Icon when menu is open.
      
                  Menu open: "block", Menu closed: "hidden"
                -->
                
              </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
              <div class="flex flex-shrink-0 items-center">
                <img class="block h-8 w-auto " src="../img/icon.png">
              </div>
              <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <a href="../accueil" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="Accueil">Accueil</a>
      
                  <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="Message">Message</a>
      
                  <a href="../games" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="Jeux">Jeux</a>
      
                  <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="Actualite">Actualité</a>
                </div>
              </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
              <button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="sr-only">View notifications</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button>
      
              <!-- Profile dropdown -->
              <div class="relative ml-3" id="fam-img">
                <div>
                  <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <?php

                    if(empty($fetch_photo["photo"])){

                        ?>

                            <div class="h-8 w-8 rounded-full font-bold text-2xl text-slate-700 bg-yellow-200 flex justify-center items-center"><?=strtoupper($symbole[0])?></div>
                            
                            <?php

                    }else{

                            $_photo = $fetch_photo["photo"];

                        ?>

                            <img src="../img/profil/<?=$_photo?>" class="h-8 w-8 rounded-full" />

                        <?php
                    }
                ?>
                  </button>
                </div>
      
                <!--
                  Dropdown menu, show/hide based on menu state.
      
                  Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                
              </div>
            </div>
          </div>
        </div>
      
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden">
          <div class="space-y-1 px-2 pt-2 pb-3" id="mobile-menu">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            
          </div>
        </div>
      </nav>
      <script>
        let btn_img_profile = document.querySelector('#user-menu-button'); 
        let fam_img = document.querySelector('#fam-img');
        let btn_menu = document.querySelector('#btn_menu');
        let mobile_menu = document.querySelector('#mobile-menu');
        let div = document.createElement('div');
        let div1 = document.createElement('div');
        let show_info = false;
        let show_menu = false;

        info_profil = `
        <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="../profil" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Parametre</a>
                  <a href="../disconnect/disconnect.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Deconnexion</a>
                  </div>
                  `;

        sous_menu = `
        <a href="../accueil" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" id="Accueil">Accueil</a>
      
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" id="Message">Message</a>

      <a href="../games" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" id="Jeux">Jeux</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" id="Actualité">Actualité</a>
        `;

        bar = `
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
        `;

        croix = `
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
        `;

        div.innerHTML=info_profil;
        div1.innerHTML=sous_menu;
        btn_img_profile.onclick=()=>{
            show_info = show_info == false ? true : false ;
            if(show_info) fam_img.appendChild(div);
            else div.remove();
        }
        btn_menu.onclick=()=>{
            show_menu = show_menu == false ? true : false ;
            if(show_menu){
                mobile_menu.appendChild(div1);
                btn_menu.innerHTML=croix;
            }else{
                div1.remove();
                btn_menu.innerHTML=bar;
            };
        }
      </script>
      <div class="h-16"></div>