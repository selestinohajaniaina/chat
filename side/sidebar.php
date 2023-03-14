<?php

   //get user info
   $_select = $db -> prepare("SELECT * FROM user WHERE idUser=$idUser");
   $_select -> execute();
   $_fetch = $_select -> fetch();
   $_me_name = $_fetch["username"];
   $_me_mail = $_fetch["email"];

   //get user's followers
   $s_nbr_f = $db -> prepare("SELECT * FROM followers WHERE (idOwner=$idUser)");
   $s_nbr_f -> execute();
   $nbr_f = count($s_nbr_f -> fetchAll());

   $s_nbr_p = $db -> prepare("SELECT * FROM post WHERE idOwner=$idUser");
   $s_nbr_p -> execute();
   $nbr_p = count($s_nbr_p->fetchAll());


?>
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" onclick="show_side();" class="inline-flex items-center fixed z-10 p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-200 text-gray-400 hover:bg-gray-700 focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="logo-sidebar" class="shadow-lg fixed left-0 z-40 w-[20%] h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-600">
      <div class="flex justify-end " onclick="hide_side();">
         <svg class="flex-shrink-0 w-7 h-7 sm:hidden transition duration-75 text-gray-400 group-hover:text-white" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#9ca3af"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="icomoon-ignore"> </g> <path d="M6.576 6.576c-5.205 5.205-5.205 13.643 0 18.849s13.643 5.205 18.849-0c5.206-5.206 5.206-13.643 0-18.849s-13.643-5.205-18.849 0zM24.67 24.67c-4.781 4.781-12.56 4.781-17.341 0s-4.781-12.56 0-17.341c4.781-4.781 12.56-4.781 17.341 0s4.78 12.56-0 17.341z" fill="#9ca3af"> </path> <path d="M10.722 9.969l-0.754 0.754 5.278 5.278-5.253 5.253 0.754 0.754 5.253-5.253 5.253 5.253 0.754-0.754-5.253-5.253 5.278-5.278-0.754-0.754-5.278 5.278z" fill="#9ca3af"> </path> </g></svg>
      </div>
         <div class="w-full flex flex-col items-center">
         <img src="../img/icon.png" class=" w-[70%]" alt="WaveConnect Logo" />
         <span class="self-center text-xl font-semibold whitespace-nowrap text-white">WaveConnect</span>
         </div>
         <hr class="my-2">
      <ul class="space-y-2">
         <li>
            <a href="../profil" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700" id="username">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap"><?=$_me_name?></span>
            </a>
         </li>
         
         <li>
            <a class="flex cursor-pointer items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
            <svg viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="#94a3b8" >
                <path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"></path>
              </svg>
               <span class="flex-1 ml-3 whitespace-nowrap"><?=$_me_mail?></span>
            </a>
         </li>

         <li>
            <a href="../followers" class="flex items-center p-2 text-base font-normal rounded-lg text-white  hover:bg-gray-700" id="suivie">
               <div class="relative">
                  <svg class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="#9ca3af" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><circle cx="22.83" cy="22.57" r="7.51"></circle><path d="M38,49.94a15.2,15.2,0,0,0-15.21-15.2h0a15.2,15.2,0,0,0-15.2,15.2Z"></path><circle cx="44.13" cy="27.22" r="6.05"></circle><path d="M42.4,49.94h14A12.24,12.24,0,0,0,44.13,37.7h0a12.21,12.21,0,0,0-5.75,1.43"></path></g></svg>
                     <span class="absolute bg-red-500 text-[7pt] font-medium rounded-full flex justify-center items-center w-4 h-4 top-0 -right-2"><?=$nbr_f?></span>
               </div>
               <span class="flex-1 ml-3 whitespace-nowrap">Suivie(s)</span>
            </a>
         </li>
         
         <li>
            <a href="../posts" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700" id="publication">
            <div class="relative">
               <svg class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Stock_cut" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#9ca3af"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <desc></desc> <g> <path d="M27,5V3H1v26 c0,1.105,0.895,2,2,2h26c1.105,0,2-0.895,2-2V5H27z" fill="none" stroke="#9ca3af" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path> <rect fill="none" height="8" stroke="#9ca3af" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" width="10" x="5" y="19"></rect> <line fill="none" stroke="#9ca3af" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="27" x2="27" y1="5" y2="24"></line> <line fill="none" stroke="#9ca3af" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="27" x2="27" y1="26" y2="28"></line> <line fill="none" stroke="#9ca3af" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="4" x2="24" y1="11" y2="11"></line> <line fill="none" stroke="#9ca3af" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="4" x2="24" y1="7" y2="7"></line> <line fill="none" stroke="#9ca3af" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="4" x2="24" y1="15" y2="15"></line> <line fill="none" stroke="#9ca3af" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="18" x2="24" y1="19" y2="19"></line> <line fill="none" stroke="#9ca3af" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="18" x2="24" y1="23" y2="23"></line> <line fill="none" stroke="#9ca3af" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="18" x2="24" y1="27" y2="27"></line> </g> </g></svg>
                     <span class="absolute bg-red-500 text-[7pt] font-medium rounded-full flex justify-center items-center w-4 h-4 top-0 -right-2"><?=$nbr_p?></span>
               </div>
               <span class="flex-1 ml-3 whitespace-nowrap">Publication(s)</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
            <svg class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#9ca3af"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 8.98987V20.3499C16 21.7999 14.96 22.4099 13.69 21.7099L9.76001 19.5199C9.34001 19.2899 8.65999 19.2899 8.23999 19.5199L4.31 21.7099C3.04 22.4099 2 21.7999 2 20.3499V8.98987C2 7.27987 3.39999 5.87988 5.10999 5.87988H12.89C14.6 5.87988 16 7.27987 16 8.98987Z" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M22 5.10999V16.47C22 17.92 20.96 18.53 19.69 17.83L16 15.77V8.98999C16 7.27999 14.6 5.88 12.89 5.88H8V5.10999C8 3.39999 9.39999 2 11.11 2H18.89C20.6 2 22 3.39999 22 5.10999Z" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 12H11" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 14V10" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
               <!-- <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg> -->
               <span class="flex-1 ml-3 whitespace-nowrap">Enregistrement(s)</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
            <svg class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" viewBox="-2.4 -2.4 28.80 28.80" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#9ca3af" stroke="#9ca3af"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{opacity:0.2;fill:none;stroke:#ababab;stroke-width:5.000000e-02;stroke-miterlimit:10;} </style> <g id="Layer_1"></g> <g id="Layer_2"> <g> <path d="M8.2,3H5.8C4.3,3,3,4.3,3,5.8v2.3C3,9.7,4.3,11,5.8,11h2.3C9.7,11,11,9.7,11,8.2V5.8C11,4.3,9.7,3,8.2,3z M9,8.2 C9,8.6,8.6,9,8.2,9H5.8C5.4,9,5,8.6,5,8.2V5.8C5,5.4,5.4,5,5.8,5h2.3C8.6,5,9,5.4,9,5.8V8.2z"></path> <path d="M18.2,3h-2.3C14.3,3,13,4.3,13,5.8v2.3c0,1.6,1.3,2.8,2.8,2.8h2.3c1.6,0,2.8-1.3,2.8-2.8V5.8C21,4.3,19.7,3,18.2,3z M19,8.2C19,8.6,18.6,9,18.2,9h-2.3C15.4,9,15,8.6,15,8.2V5.8C15,5.4,15.4,5,15.8,5h2.3C18.6,5,19,5.4,19,5.8V8.2z"></path> <path d="M18.2,13h-2.3c-1.6,0-2.8,1.3-2.8,2.8v2.3c0,1.6,1.3,2.8,2.8,2.8h2.3c1.6,0,2.8-1.3,2.8-2.8v-2.3C21,14.3,19.7,13,18.2,13 z M19,18.2c0,0.5-0.4,0.8-0.8,0.8h-2.3c-0.5,0-0.8-0.4-0.8-0.8v-2.3c0-0.5,0.4-0.8,0.8-0.8h2.3c0.5,0,0.8,0.4,0.8,0.8V18.2z"></path> <path d="M8.2,13H5.8C4.3,13,3,14.3,3,15.8v2.3C3,19.7,4.3,21,5.8,21h2.3c1.6,0,2.8-1.3,2.8-2.8v-2.3C11,14.3,9.7,13,8.2,13z M9,18.2C9,18.6,8.6,19,8.2,19H5.8C5.4,19,5,18.6,5,18.2v-2.3C5,15.4,5.4,15,5.8,15h2.3C8.6,15,9,15.4,9,15.8V18.2z"></path> </g> </g> </g></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Application(s)</span>
            </a>
         </li>
      </ul>
   
      

   </div>
</aside>
<script>
   let sidebar = document.querySelector('#logo-sidebar');
   function show_side(){
      sidebar.style.transform = "translatex(0)";
      sidebar.style.width = "50%";
   }
   function hide_side(){
      sidebar.style.transform = "translatex(-100%)";
   }
</script>