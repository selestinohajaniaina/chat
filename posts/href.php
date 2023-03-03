<script defer>
        let id=document.querySelector('#post_<?=$post_id?>');
        console.log(id);
        id.onclick=()=>{
        document.location.href="../post?id_post=<?=$post_id?>";
        }
</script>