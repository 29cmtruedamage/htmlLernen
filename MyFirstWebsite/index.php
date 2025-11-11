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
            background-color: #E0E0E0;
            margin: 0;
        }
        
        .bsp{
            flex-direction: column;
            padding-top: 100px;
            background-color: #2461a6;
            width: 20%;
            height: 400px;
            
        }
        
        .bsp a{
            display: flex;
            text-decoration: none;
            color: rgb(200, 200, 200);
            align-items: center;
            padding-top: 10px;
            padding-bottom: 10px;
            gap: 8px;
            margin: 0;
        }
        .bsp a:hover{
            background-color: rgb(200, 200, 200, 0.1);
        }
        
        .phpBlock{
            background-color: #FFFFFF;
            width: 80%;
            border-radius: 10px;
            padding: 20px;
            margin-right: 20px;
            margin-top: 110px;
            margin-left: 20px;
        }
        .phpBlock h1{
            display: flex;
            justify-content: center;
            font-size: 24px;
            background-color: lightgray;
        }
        .phpBlock p{
            font-size: 14px;
            
        }
        
        .main{
            display: flex;
            
        }
        .Bar{
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            background-color: white;
            display: flex;
            align-items: center;
            
        }
        .Bar h1{
            margin-left: 20px;
            margin-right: 60px;
            color: black;
        }
        .Bar a{
            padding: 20px;
            display: flex;
            margin: 0;
            text-decoration: none;
            color: black;
            gap: 8px;
            
        }
        .Bar a:hover{
            background-color: rgb(200, 200, 200, 0.1)
        }

        .Knt{
            display: inline-block;
        }
        .Kontakte{
           
        }
        .person{
            position: relative;
            margin-bottom: 8px;
            background-color: lightgrey;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .anrufen{
            position: absolute;
            text-decoration: none;
            right: 0;
            top: 0;
            background-color: khaki;
            padding: 1px;
        }
        .anrufen a{
            text-decoration: none;
            color: darkgoldenrod;
        }
        .anrufen:hover{
            background-color: darkkhaki;
        }
        .löschen{
            position: absolute;
            text-decoration: none;
            right: 0px;
            top: 30px;
            background-color: red;
            padding: 1px;
        }
        .löschen a{
            text-decoration: none;
            color: black;
        }
        .löschen:hover{
            background-color: lightcoral;
        }
        
    </style>
</head>
<body>
    <div class="main">
        <div class="bsp">
            <a href="index.php?page=start"><img src="img/home.png"> Startseite</a>
            <a href="index.php?page=contacts"><img src="img/mail.png"> Kontakte hinzufügen</a>
            <a href="index.php?page=showContacts"><img src="img/mail.png"> Kontakte anzeigen</a>
        </div>

        <div class="phpBlock">
            <?php
                $contacts = [];
                
                if (file_exists('contacts.txt')) {
                    $text = file_get_contents('contacts.txt', true);
                    $contacts = json_decode($text, true);
                    if (!is_array($contacts)) {
                        $contacts = []; // leeres Array, wenn Datei leer oder ungültig
                    }
            }


            if (isset($_POST['name']) && isset($_POST['phone'])) {
                echo 'Kontakt <b>' . $_POST['name'] . '</b> wurde hinzugefügt';
                $newContact = [
                    'name' => $_POST['name'],
                    'phone' => $_POST['phone']
                ];
                array_push($contacts, $newContact);
                file_put_contents('contacts.txt', json_encode($contacts, JSON_PRETTY_PRINT));
            }
                $headline = "Herzlich willkommen";
                
                if($_GET["page"] == "contactDeleted") {
                    $id = $_GET["id"];
                    $text = file_get_contents('contacts.txt', true);
                    $contacts = json_decode($text, true);
                    foreach ($contacts as $key => $contact) {
                        if($contact["name"] == $id){
                            unset($contacts[$key]);
                            break;
                        }
                    }
                    $contacts = array_values($contacts);
                    file_put_contents('contacts.txt', json_encode($contacts, JSON_PRETTY_PRINT));
                    echo "Kontakt gelöscht: " . $id;
                }
                if($_GET["page"] == "start"){
                    $currentSitename = "Startseite";
                    echo "<h1>" . $headline ." in ". $currentSitename . "</h1>";
                    echo "<p>Folgende Kontakte sind online:</p>
                    <ul>
                        <li>Max Mustermann</li>
                        <li>Erika Musterfrau</li>
                        <li>John Doe</li>
                        <li>Jane Doe</li>
                    </ul>";
                }
                
                elseif($_GET["page"] == "contacts"){
                    $currentSitename = "Contacts";
                    echo "<h1>" . $headline ." in ". $currentSitename . "</h1>";
                    echo " 
                    <form action='?page=contacts' method='post'>
                        <div class='Knt'>
                            <p>Kontakt hinzufügen:</p>
                            <p><input placeholder='Name eingeben' name='name'></p>
                            <p><input placeholder='Telefonnummer eingeben' name='phone'></p>
                            <p><button type='submit'>Kontakt hinzufügen</button></p>
                        </div>
                    </form>";
            }elseif($_GET["page"] == "showContacts"){
                echo "<h1>Hier werden deine Kontakte angezeigt</h1>";
                echo "<div class='Kontakte'>";
                foreach($contacts as $contact){
                    echo "<div class='person'>
                            <b><u>" . $contact["name"] . "</u></b><br>".
                            $contact["phone"] . 
                            "<div class='anrufen'> 
                                <a href='tel:anrufen'> Anrufen </a>
                            </div>".
                            "<div class='löschen'> 
                                <a href='index.php?page=contactDeleted&id=".$contact["name"]."'> Löschen </a>
                            </div>".
                         "</div>";
                }
                echo "</div>";
            }
            

                
            ?>
        </div>
    </div>
 

    <div class="Bar">
        <h1>Kontaktbuch</h1>
        <a href="myFirstCode.php?page=impressum">Suche</a>
        <a href="index.php?page=contacts">2_Suchelement</a>
    </div>
</body>
</html>