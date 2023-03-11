<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/output.css">
    <script src="fetch.js" defer></script>
</head>
<style>
    #Actualite{
            background-color: rgb(17 24 39);
    }
    .container{
        display:flex;
        margin:8px;
        position: relative;
        background:#efefef;
        border:2px solid rgba(183,183,183,0.2);
        border-radius:10px;
        overflow:hidden;
        box-shadow:0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    }
    .image{
        width:700px;
        height:auto;
        display:flex;
        cursor:pointer;
        overflow: hidden;
    }
    .image > img:hover{
        transition:all 0.5s ease;
        transform:scale(1.05);
    }
    @media (max-width:600px) {
        .container{
            flex-direction:column;
            margin:8px;
        }
        .image{
        width:100%;
        height:auto;
        }
        .content{
        position:absolute;
        bottom:0;
        width:100%;
        background:rgba(255,255,255,0.7);
        }
        .description {
        display:none;
        }
    }
    @media (max-width:320px) {
        .title_span,.date {
        display:none;
        }
        .content{
        height:fit-content;
        }
    }
    .content{
        padding:8px;
    }
    .title_span{
        font-size:15pt;
    }
    .title_span:hover{
        text-decoration:underline;
    }
    .date{
        position:absolute;
        right:0;
        bottom:0;
        margin:4px;
    }
    .description > p{
        width:90%;
        text-align:justify;
    }
</style>
<body>
<?php
    require('../navbar.php');
    require('../side/sidebar.php');

    ?>
    <div id="data" class="sm:w-[80%] sm:absolute sm:right-0">
        
    </div>
</body>
</html>