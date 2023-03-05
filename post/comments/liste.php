<?php

//date now
$startTime = date("Y-m-d H:i:s");
//add 3 hour to time
$now = date('Y-m-d H:i:s',strtotime('+3 hour',strtotime($startTime)));

//get all comments in db

for ($i = 0; $i < $nbrPost; $i++) {

    $idOwner = $fetchPost[$i]['idUser'];
    $texte_coms = $fetchPost[$i]['texte'];
    $date_coms = $fetchPost[$i]['date_coms'];
    
    //convert into << A l'instant or 1min or 2min or 1j ... >>
    $interval = (new DateTimeImmutable($date_coms))->diff((new DateTimeImmutable($now)));
    $dayComs = $interval->format("%a");
    $houComs = $interval->format("%H");
    $minComs = $interval->format("%I");
    $secComs = $interval->format("%S");

    //fetch info owner of the comment
    $pselect = $db->prepare("select * from user where idUser='$idOwner'");
    $pselect->execute();
    $pfetch = $pselect->fetch();
    $ownerName = $pfetch['username'];

    //selecting photo (pdp)
    $pdpSelect = $db->prepare("select * from pdp where idUser='$idOwner'");
    $pdpSelect->execute();
    $pdpFetch = $pdpSelect->fetch();

    // if(empty($pdpFetch["photo"])) $pdp="pdp.jpg";
    // else
    // $pdp = $pdpFetch['photo'];
    ?>
    <div class="m-3 bg-gray-100 flex sm:w-[25rem] rounded">
        <div class="m-1">
            <?php if (empty($pdpFetch['photo'])) { ?>
                <div class="rounded-3xl  font-mono font-bold text-3xl text-slate-700 bg-yellow-200 w-12 h-12 flex justify-center items-center border-solid border-4 border-gray-200">
                    <?= strtoupper($ownerName[0]) ?>
                </div>
            <?php } else {$pdp = $pdpFetch['photo']; ?>
                <img src="../img/profil/<?= $pdp ?>" class="w-12 rounded-3xl border-solid border-4 border-gray-200" />
            <?php } ?>
        </div>
        <div class="m-1 w-full p-1">
        <div  class=" bg-gray-200 p-2 rounded-[15px]">
            <div>
                        <a href="../profil?idUser=<?= $idOwner ?>" class="capitalize text-[13pt] font-medium hover:underline">
                            <?= $ownerName ?>
                        </a>
            </div>
            <div>
                <p class="font-medium text-gray-700">
                    <?= $texte_coms ?> 
                </p>
            </div>
        </div>
        <div class=" text-[8pt] pl-2"><?= $date_coms ?> </div>
        </div>
    </div>
        <?php
}

?>
