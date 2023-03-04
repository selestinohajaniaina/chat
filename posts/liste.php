<?php

$like=162;

//selection de publication

$postSelect = $db -> prepare("SELECT * FROM post ORDER BY id_post DESC");
$postSelect->execute();
$fetch=$postSelect->fetchAll();
$listeNbr = count($fetch);

//list of all post 

?>
<div class="bg-gray-50 flex flex-col items-center">
<?php

for($i=0;$i<$listeNbr;$i++){
    ?>
<div class="bg-gray-100 rounded w-fit mt-2 shadow-xl ">
    <div class="m-3 w-fit">
        <?php
            $post_id=$fetch[$i]["id_post"];
            $post_img=$fetch[$i]["photo"];
            $post_legende=$fetch[$i]["legend"];
            $post_id_auteur=$fetch[$i]["idOwner"];
            $post_date=$fetch[$i]["date"];

            
            
            //selection d'utilisateur du compte

            $selecUser=$db ->prepare("SELECT * FROM user WHERE idUser=$post_id_auteur");
            $selecUser->execute();
            $fetchUser=$selecUser->fetch();
            $nameUserPost = $fetchUser["username"];
            
            //selection de pdp d'utilisateur

            $pdpOwner=$db ->prepare("SELECT * FROM pdp WHERE idUser=$post_id_auteur");
            $pdpOwner->execute();
            $fetchpdp=$pdpOwner->fetch();

            
            ?>

            <!-- pdp + nom + prenom de proprietaire -->

            <div class="p-2 flex items-center bg-gray-200 rounded-t-2xl">
                <?php

                    if(empty($fetchpdp["photo"])){

                        ?>

                            <div class="rounded-3xl font-mono text-3xl bg-yellow-200 w-12 h-12 flex justify-center items-center border-solid border-4 border-gray-200"><?=strtoupper($nameUserPost[0])?></div>
                            
                            <?php

                    }else{

                        $pdpUserPost = $fetchpdp["photo"];

                        ?>

                            <img src="../img/profil/<?=$pdpUserPost?>" class="w-12 rounded-3xl border-solid border-4 border-gray-200" />

                        <?php
                    }
                ?>


            <div class="w-fit pl-1 flex flex-col">

                <h5>
                    <a href="../profil?idUser=<?=$post_id_auteur?>" class="capitalize font-bold hover:underline">
                    <?=$nameUserPost?>
                    </a>
                </h5>

                <span class=" font-thin text-gray-500 text-opacity-80 text-[0.6rem]"><?=$post_date?></span>

            </div>

            </div>

            <!-- text du publication -->

            <?php
                if(empty($post_img)){
                    ?>
                    <div>
            <p class="p-2 bg-gray-100 text-3xl max-w-lg text-center"><?=$post_legende?></p>
            </div>
                    <?php
                }else{
            ?>

            <!-- image + legende du publication -->
            
            <div>
            <p class="p-2 bg-gray-100 font-medium max-w-lg text-justify"><?=$post_legende?></p>
            <div class="rounded overflow-hidden">
            <img src="../img/post/<?=$post_img?>"  title="<?=$post_img?>" class="w-132 cursor-pointer hover:scale-105 transition-all duration-500 ease-in-out" />
            </div>
            </div>
            <?php
                }
            ?>

                <!-- like + comment + share -->

            <div class="bg-gray-200 flex justify-around mt-2 font-medium rounded">
                <div class="bg-slate-300 w-full flex justify-center items-center cursor-pointer rounded-3xl hover:opacity-80 m-[6px]">
                    <!-- like boutton -->
                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 9.40652C3.44772 9.40652 3 9.85424 3 10.4065V18.4065C3 20.0634 4.34315 21.4065 6 21.4065H9V9.40652H4Z" fill="#152C70"></path> <path d="M14.3059 4.16184C13.9067 2.9643 12.3868 2.60551 11.4942 3.4981L7.87868 7.11364C7.31607 7.67624 7 8.43931 7 9.23495V20.4065C7 20.9588 7.44772 21.4065 8 21.4065H15.6812C16.8813 21.4065 17.9659 20.6913 18.4386 19.5883L20.7574 14.1778C20.9175 13.8043 21 13.4023 21 12.996V12.4065C21 10.7497 19.6569 9.40653 18 9.40653H14.2808L14.4771 8.62115C14.8452 7.14867 14.7858 5.60175 14.3059 4.16184Z" fill="#4296FF"></path> </g></svg>
                    <form method="get">
                        input
                    </form>
                </div>

                <div class="bg-slate-300 w-full flex justify-center items-center overflow-hidden cursor-pointer rounded-3xl hover:opacity-80 m-[6px]">
                    <!-- comment boutton -->
                    <a href="../post?id_post=<?=$post_id?>" class="w-full flex justify-center">
                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5.20713 15.7929C4.95238 15.5382 4.58029 15.4401 4.23309 15.5363C3.88589 15.6325 3.61726 15.908 3.52988 16.2575L2.52988 20.2575C2.44468 20.5983 2.54453 20.9587 2.79291 21.2071C3.04129 21.4555 3.40178 21.5554 3.74256 21.4702L7.74256 20.4702C8.09207 20.3828 8.36757 20.1142 8.46374 19.767C8.5599 19.4198 8.46188 19.0477 8.20713 18.7929L5.20713 15.7929Z" fill="#152C70"></path> <path d="M12 2.5C6.75329 2.5 2.5 6.75329 2.5 12C2.5 17.2467 6.75329 21.5 12 21.5C17.2467 21.5 21.5 17.2467 21.5 12C21.5 6.75329 17.2467 2.5 12 2.5Z" fill="#4296FF"></path> <path d="M9 12C9 12.8284 8.32843 13.5 7.5 13.5C6.67157 13.5 6 12.8284 6 12C6 11.1716 6.67157 10.5 7.5 10.5C8.32843 10.5 9 11.1716 9 12Z" fill="#152C70"></path> <path d="M13.5 12C13.5 12.8284 12.8284 13.5 12 13.5C11.1716 13.5 10.5 12.8284 10.5 12C10.5 11.1716 11.1716 10.5 12 10.5C12.8284 10.5 13.5 11.1716 13.5 12Z" fill="#152C70"></path> <path d="M18 12C18 12.8284 17.3284 13.5 16.5 13.5C15.6716 13.5 15 12.8284 15 12C15 11.1716 15.6716 10.5 16.5 10.5C17.3284 10.5 18 11.1716 18 12Z" fill="#152C70"></path> </g></svg>

                    </a>
                </div>

                <div class="bg-slate-300 w-full flex justify-center items-center cursor-pointer rounded-3xl hover:opacity-80 m-[6px]">
                    <!-- share boutton -->
                    <svg width="40px" height="40px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M812.8 665.6L413.866667 512l398.933333-153.6c32-12.8 49.066667-49.066667 36.266667-83.2-12.8-32-49.066667-49.066667-83.2-36.266667l-554.666667 213.333334C187.733333 460.8 170.666667 486.4 170.666667 512s17.066667 51.2 40.533333 59.733333l554.666667 213.333334c8.533333 2.133333 14.933333 4.266667 23.466666 4.266666 25.6 0 49.066667-14.933333 59.733334-40.533333 12.8-34.133333-4.266667-70.4-36.266667-83.2z" fill="#152C70"></path><path d="M234.666667 512m-149.333334 0a149.333333 149.333333 0 1 0 298.666667 0 149.333333 149.333333 0 1 0-298.666667 0Z" fill="#1E88E5"></path><path d="M789.333333 298.666667m-149.333333 0a149.333333 149.333333 0 1 0 298.666667 0 149.333333 149.333333 0 1 0-298.666667 0Z" fill="#1E88E5"></path><path d="M789.333333 725.333333m-149.333333 0a149.333333 149.333333 0 1 0 298.666667 0 149.333333 149.333333 0 1 0-298.666667 0Z" fill="#1E88E5"></path></g></svg>
                <!-- <a href="../post?id_post=16" class="w-full" style="background:gray;width:100%">Ecrir votre commentaire...</a> -->
                </div>
                
            </div>
    </div>
</div>

<?php
// require("href.php");
}
?>

</div>