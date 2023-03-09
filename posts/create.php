<form method="post" class="fixed bottom-0 right-0 m-2 bg-blue-400 h-12 w-12 rounded-full overflow-hidden border-solid border-4 border-blue-700">
<button type="button" onclick="f();" name='creatpost' class="bg-blue-400 h-full w-full cursor-pointer flex justify-center items-center hover:opacity-80">
<svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 12L12 12M12 12L17 12M12 12V7M12 12L12 17" stroke="#ededed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
</button>
</form>
<?php
// if(isset($_POST["creatpost"])){
    ?>
    <dialog class="demo-dialog" style="border-radius: 15px;">
    <div class="absolute right-0 m-2 top-0 h-[30px] w-[30px] cursor-pointer" onclick="g();">
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(45)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 7V17M7 12H17M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#4a4a4a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
    </div>
      <h6>Creer un publication pour votre suivis:</h6>
      <br>
        <form method="post" enctype="multipart/form-data">

<div class="flex justify-center">
  <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
    <textarea
      name="legende"
      class="font-medium peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 focus:border-blue-600 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-800 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
      rows="2"
      placeholder="Your message"></textarea>
    <label
      class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate leading-[1.6] transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-current peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:bg-white dark:peer-focus:text-blue-600"
      >Ajouter une description
    </label>
  </div>
</div>

<div class="border-solid min-h-8 w-96 relative overflow-hidden cursor-pointer flex border-blue-600 rounded border-2">
          <div id="imgContent"></div>
          <label class="bg-blue-300 font-medium cursor-pointer w-full text-center" id="label">Choisir une image</label>
          <input type="file" accept="image/*" name="imagepost" id="image_post" title="Choisir une image" id="file" class="text-tras outline-none opacity-0 cursor-pointer w-128 translate-x-0.001 absolute h-32 float" onchange="myFunction();">
        </div>
            <div class="flex justify-center">
            <input type="submit" value="publier" name="btn_post" onclick="g();" class="bg-blue-500 py-1 px-4 w-full mx-1 my-2 rounded-lg " />
            <input type="button" value="Annuler" onclick="g();" class="bg-gray-200 h-fit py-1 px-4 mx-1 my-2 w-full rounded-lg">
            </div>
        </form>
        <span id="err"></span>
    </dialog>
    <script>
        function f(){
            const dialog = document.querySelector('.demo-dialog');
            dialog.showModal();
        }
        // f();
        function g(){
            const dialog = document.querySelector('.demo-dialog');
            dialog.close();
        }
        g();
        function myFunction() {

          var file = document.getElementById('image_post').files[0];
          var size = document.getElementById('image_post').files[0].size;
          let imgContent = document.querySelector('#imgContent');
          let label = document.querySelector('#label');
          console.log(size);

          //si la taill est gros
          if(size<2000000){
            var reader  = new FileReader();
            // it's onload event and you forgot (parameters)
            reader.onload = function(e)  {
            var image = document.createElement("img");
            // the result image data
            image.src = e.target.result;
            imgContent.innerHTML='';
            imgContent.appendChild(image);
            label.remove();
            }
            // you have to declare the file loading
            reader.readAsDataURL(file);

          }else{
            newSize = size/1000000;
            newSize = newSize.toFixed(2);
            label.innerHTML = `${newSize}Mo > 2Mo, choisir une autre image`;
            label.setAttribute('class','bg-red-300  font-medium cursor-pointer w-full text-center');
            document.getElementById('image_post').value=null;
          }

        }
    </script>

<style> 
  input{
    cursor: pointer;
  }
  input:hover{
    opacity:0.8;
  }
  input[type="file"]:hover{
    opacity:0;
  }
</style>

    <?php
// }
require('insert.php');
?>