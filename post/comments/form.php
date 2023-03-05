<form method="post">
                    <div class="bg-gray-200 flex items-center mt-2 font-medium rounded">
                        <input type="text" name="comment" class="bg-gray-100 outline-none w-full rounded m-3" placeholder="Ecrir votre commentaire..." autocomplete=off autofocus/>
                        <button type="submit" name="send" class=" pr-2 pl-2 mr-2 text-white rounded bg-blue-500 h-fit">
                        <svg width="45px" height="27px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M18.61 2.64548C20.1948 2.19021 21.6568 3.65224 21.2016 5.23705L17.1785 19.2417C16.5079 21.5761 13.3904 22.0197 12.1096 19.9629L10.3338 17.1113C9.84262 16.3226 9.96155 15.2974 10.6207 14.6383L14.4111 10.8479C14.8022 10.4567 14.8033 9.82357 14.4134 9.43373C14.0236 9.04389 13.3905 9.04497 12.9993 9.43614L9.20901 13.2265C8.54987 13.8856 7.52471 14.0046 6.73596 13.5134L3.88412 11.7375C1.82737 10.4567 2.27092 7.33918 4.60532 6.66858L18.61 2.64548Z" fill="#fff"></path> </g></svg>
                        </button>
                    </div>
</form>

<?php

    if(isset($_POST["send"])){
        if(!empty($_POST["comment"])){
            $textComment = $_POST["comment"];

            //date now
            $startTime = date("Y-m-d H:i:s");
            //add 3 hour to time
            $now = date('Y-m-d H:i:s',strtotime('+3 hour',strtotime($startTime)));
            
            //insering comments into db
            $insertComs = $db -> prepare("INSERT INTO comment(id_post, idUser, texte, date_coms) VALUES (:post_id, :user_id, :coms_text, :coms_date)");
            $insertComs -> execute([
                "post_id"=>$post_id,
                "user_id"=>$idUser,
                "coms_text"=>$textComment,
                "coms_date"=>$now
            ]);

            // actualiser la page apres l'envoi

            ?>
            <script>
                document.location.href="../post?id_post=<?=$post_id?>";
            </script>
            <?php

        }
    }
    
?>