<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Elms+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: "Elms Sans", sans-serif;
            background-color: #b0e8e8;
            margin: 0;
        }
        .Inhalt{
            padding: 100px;
            text-align: center;
            background-color: burlywood;
            margin-top: 50px;
        }
        .Inhalt p{
            color: brown;
        }
        .bsp{
            padding-top: 150px;
            background-color: #2461a6;
            width: 20%;
            height: 150px;
            text-align: left;
            align-content: center;
        }
        .bsp a{
            text-decoration: none;
            color: rgb(200, 200, 200);
        }
        .phpBlock{
            text-align: left;
            
            width: 80%;
            
            margin-left: 20px;
            margin-right: 20px;
        }
        .main{
            display: flex;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="bsp">
            <a href="myFirstCode.php?page=impressum"><img src="img/home.png"> Impressum</a>
            <p><a href="index.php?page=contacts"><img src="img/mail.png"> Kontakte</a></p>


        </div>

        <div class="phpBlock">
            <?php
                $headline = "Herzlich willkommen";
                
                $currentSitename;
                if($_GET["page"] == "start"){
                    $currentSitename = "Startseite";
                }else{
                    $currentSitename = "Contacts";
                }

                echo"<h1>". $headline ." in ". $currentSitename ."<h1>";
            ?>
        </div>
    </div>
    <div class="Inhalt">
        <p>Folgender Inhalt: </p>
        laylaylom 
    </div>
</body>
</html>