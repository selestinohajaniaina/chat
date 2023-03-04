<?php

    // count likes
    $selectNbrLike = $db -> prepare("SELECT * FROM likepost WHERE (id_post=$post_id)");
    $selectNbrLike -> execute();
    $fetchNbrLike=$selectNbrLike->fetchAll();
    $NbrLike = count($fetchNbrLike);

    if($NbrLike>0){
        ?>
        <span class="absolute left-[30%] top-[20%] font-bold text-gray-700">
            <?=$NbrLike?>
        </span>
        <?php
    }

    $selectLike = $db -> prepare("SELECT * FROM likepost WHERE (id_post=:id_post AND idUser=:idUser)");
    $selectLike->execute([
        "id_post"=>$post_id,
        "idUser"=>$idUser,
    ]);

    $fetchLike = $selectLike -> fetch();

    if(!empty($fetchLike["idLike"])){
        $idLike = $fetchLike["idLike"];
    }

    if(empty($idLike)){

        ?>
            <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M3 9.59128C3 9.03899 3.44772 8.59128 4 8.59128H9V20.5913H4C3.44772 20.5913 3 20.1436 3 19.5913V9.59128ZM5 10.5913V18.5913H7V10.5913H5Z" fill="#133d90"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8988 5.44993C12.7445 4.98708 12.1571 4.8484 11.8121 5.19339L9.72621 7.27927C9.26122 7.74426 9 8.37491 9 9.0325V18.5913H14.3624C15.5625 18.5913 16.6471 17.8761 17.1199 16.773L18.8796 12.6669C18.959 12.4816 19 12.282 19 12.0804C19 11.258 18.3333 10.5913 17.5109 10.5913H13C12.6921 10.5913 12.4013 10.4494 12.2118 10.2067C12.0223 9.96396 11.9552 9.64747 12.0299 9.34873L12.9129 5.81665C12.9432 5.69556 12.9383 5.56834 12.8988 5.44993ZM10.3979 3.77918C11.7942 2.38289 14.1717 2.94415 14.7962 4.81747C14.9559 5.29673 14.9757 5.81162 14.8532 6.30172L14.2808 8.59127H17.5109C19.4379 8.59127 21 10.1534 21 12.0804C21 12.5529 20.904 13.0205 20.7179 13.4548L18.9581 17.5609C18.1702 19.3993 16.3626 20.5913 14.3624 20.5913H7V9.0325C7 7.84448 7.47194 6.70512 8.312 5.86506L10.3979 3.77918Z" fill="#3d9bff"></path> </g></svg>
        <?php

    }else{
    
        ?>
            <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 9.40652C3.44772 9.40652 3 9.85424 3 10.4065V18.4065C3 20.0634 4.34315 21.4065 6 21.4065H9V9.40652H4Z" fill="#152C70"></path> <path d="M14.3059 4.16184C13.9067 2.9643 12.3868 2.60551 11.4942 3.4981L7.87868 7.11364C7.31607 7.67624 7 8.43931 7 9.23495V20.4065C7 20.9588 7.44772 21.4065 8 21.4065H15.6812C16.8813 21.4065 17.9659 20.6913 18.4386 19.5883L20.7574 14.1778C20.9175 13.8043 21 13.4023 21 12.996V12.4065C21 10.7497 19.6569 9.40653 18 9.40653H14.2808L14.4771 8.62115C14.8452 7.14867 14.7858 5.60175 14.3059 4.16184Z" fill="#4296FF"></path> </g></svg>
        <?php
    }
    $idLike=0;
?>