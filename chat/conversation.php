<?php

        $selectMsg=$db->prepare("select * from message order by idMsg");
    $selectMsg->execute();
    $nbrMsg=$selectMsg->rowCount();
    $fetchMsg=$selectMsg->fetchAll();
    
        echo $idUser;
?>
<div class=" grid grid-cols-4 max-h-[80vh] overflow-y-auto w-full p-2" id="contener">
    <?php 
    for($i=0;$i<$nbrMsg;$i++){ 
        $selectUser=$db->prepare("select * from user where idUser=?");
        $selectUser->execute([$fetchMsg[$i]["idUser"]]);
        $fetchUser=$selectUser->fetch();
        $dbName=$fetchUser["username"];
        ?>


    <div class="w-80 m-px border-gray-300 border-2 p-2">
        <div class="flex items-center p-px justify-between">
            <div class="flex items-center" >
            <img class="rounded-full w-14 h-14" src="https://scontent.ftnr2-2.fna.fbcdn.net/v/t39.30808-6/328743058_1813426999032897_1600248312707379824_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=Ubt9DeMdo2sAX_RxonB&_nc_ht=scontent.ftnr2-2.fna&oh=00_AfCVWXVzzNb7XguNpH1uiQrEafyqvTiHuSq0l8dFMdVy5Q&oe=63E7F863" />
            <p class="pl-1">@<?=$dbName?></p>
            </div>

        <div class=" cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
        </div>
        </div>
        <div class="border-y-2 m-1">
        <p><?= $fetchMsg[$i]["msg"];?></p>
        </div>


        <div class="flex ">

        <div class="bg-slate-300 flex w-20 p-0.5 rounded-xl justify-center cursor-pointer">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="#ff3838" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            <span class="pl-1 text-rose-500">
            Like
            </span>
        </div>

        <div class="bg-slate-300 flex w-20 p-0.5 ml-1 rounded-xl justify-center cursor-pointer">
        <svg viewBox="0 0 24 24" width="20" height="20" stroke="#38faffd4" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            <span class="pl-1 text-cyan-300">
            Like
            </span>
        </div>

        </div>

    </div>
    <?php 
} ?>
</div>
<style>
    @media (max-width:1200px) {
        #contener{
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
    }
    @media (max-width:900px) {
        #contener{
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    }
    @media (max-width:600px) {
        #contener{
        grid-template-columns: repeat(1, minmax(0, 1fr));
    }
    }
</style>
<script>
    let contener=document.querySelector('#contener');
        contener.scrollTop = contener.scrollHeight;
</script>