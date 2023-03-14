<?php
    $select_nbr = $db -> prepare("SELECT * FROM followers WHERE (idOwner=$idUser)");
    $select_nbr -> execute();
    $fetch=$select_nbr->fetchAll();

    $nbrFollow = count($fetch);
    // echo $nbrFollow;

    ?>
        <div class="bg-gray-500 h-full p-8 flex flex-col items-center sm:w-[80%] sm:absolute sm:right-0">
    <?php

    for($i=0;$i<$nbrFollow;$i++){

        $follower_id=$fetch[$i]["idFollow"];

        //selection du nom followers

        $select_f=$db ->prepare("SELECT * FROM user WHERE idUser=$follower_id");
        $select_f->execute();
        $fetch_f=$select_f->fetch();
        $name_f = $fetch_f["username"];
        $email_f = $fetch_f["email"];
        
        //selection du pdp followers

        $select_pdp_f=$db ->prepare("SELECT * FROM pdp WHERE idUser=$follower_id");
        $select_pdp_f->execute();
        $fetch_f=$select_pdp_f->fetch();

        //verifier si deja suivie

        $selectf = $db -> prepare("SELECT * FROM followers WHERE (idOwner=$follower_id AND idFollow=$idUser)");
        $selectf -> execute();
        $isHave = count($selectf -> fetchAll());

        ?>

<!-- pdp du followers -->

    <div class="p-2 m-2 flex items-center bg-gray-200 w-[70%] rounded-2xl">
        <?php

                if(empty($fetch_f["photo"])){
         ?>
                        <div class="rounded-3xl font-bold text-3xl text-slate-700 bg-yellow-200 w-12 h-12 flex justify-center items-center border-solid border-4 border-gray-200"><?=strtoupper($name_f[0])?></div>
        <?php
                }else{
                    $pdp_f = $fetch_f["photo"];
        ?>
                        <img src="../img/profil/<?=$pdp_f?>" class="w-12 rounded-3xl border-solid border-4 border-gray-200" />
        <?php
                }
        ?>
        <div class="sm:flex justify-between w-full">
                <a href="../profil/?idUser=<?=$follower_id?>" class="hover:underline font-medium m-2"><?=$name_f?></a>
                <div>
                <a class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                    Message
                </a>
                <span>
                    <?php
                    if($isHave>0){
                        ?>

                        <a href="follows/unfollow.php?id_f=<?=$follower_id?>" class="bg-gray-500 active:bg-gray-600 text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                            Suivi(e)
                        </a>
                        <?php
                    }else{
                        ?>
                        <a href="follows/follow.php?id_f=<?=$follower_id?>" class="bg-blue-500 w-[85px] active:bg-blue-600 text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                        Suivre
                        </a>

                        <?php
                    }
                    $isHave=0;
                    ?>
                </span>
                </div>
        </div>
    </div>
        
    <?php     
    }
    ?>
    </div>