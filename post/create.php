<form method="post">
<input type="submit" value="creer" name='creatpost'/>

</form>
<?php
if(isset($_POST["creatpost"])){
    ?>
    <dialog class="demo-dialog" style="border-radius: 15px;">
      <h6>Creer un publication pour votre amis:</h6>
      <br>
        <form method="post" enctype="multipart/form-data">

<div class="flex justify-center">
  <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
    <textarea
      class="font-medium peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 focus:border-blue-600 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-800 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
      rows="2"
      placeholder="Your message"></textarea>
    <label
      class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate leading-[1.6] transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-current peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:bg-white dark:peer-focus:text-blue-600"
      >Ajouter une description
    </label>
  </div>
</div>

        <div class="img"></div>
        <div class="border-solid flex justify-center border-blue-600 rounded border-2" id="imgContent">
          <label class="bg-red-500 font-medium">Choisir une image</label>
        <input type="file" name="imagepost" id="image_post" class="outline-none opacity-10 absolute" onchange="charge();">
        </div>
            <div class="flex justify-center">
            <input type="submit" value="publier" name="btn_post" onclick="g();" class="bg-blue-500 py-1 px-4 mx-1 my-2 rounded-lg " />
            <input type="button" value="Annuler" onclick="g();" class="bg-gray-200 h-fit py-1 px-4 mx-1 my-2 rounded-lg">
            </div>
        </form>
        
    </dialog>
    <script>
        function f(){
            const dialog = document.querySelector('.demo-dialog');
            dialog.showModal();
        }
        f();
        function g(){
            const dialog = document.querySelector('.demo-dialog');
            dialog.close();
        }
        function charge(){
          let imgContent = document.querySelector('#imgContent');
          let file = document.querySelector('#image_post');
          let newImg = new Image();
          newImg.src=file.value;
          imgContent.appendChild(newImg);
        }
    </script>

<style>
  input{
    cursor: pointer;
  }
</style>

    <?php
}
require('insert.php');
?>