<!DOCTYPE html>

<html lang=it>
    <head>
        <meta charset=utf-8>
        <link rel="stylesheet" href="./pages/stylesheet.css">
        <title>Esercizio File PHP</title>
    </head>
    <body>
        <div class="linkContainer">
            <a href="./pages/script.php?link=link1">Link1</a>
            <a href="./pages/script.php?link=link2">Link2</a>
            <a href="./pages/script.php?link=link3">Link3</a>
        </div>
        <?php
            if(!file_exists("./pages/contatori.json")){
                $contatori = ["link1" => 0, "link2" => 0, "link3" =>0];
                $stringa_json = json_encode($contatori);
                file_put_contents("./pages/contatori.json", $stringa_json);
            }
            //recupero la stringa json dal file
            $stringa_contatori_json = file_get_contents("./pages/contatori.json");
            //la converto in array associativo
            $contatori = json_decode($stringa_contatori_json, true);
            //visualizzo i contatori 
            echo "<p class='para'>Hai cliccato il link1 {$contatori["link1"]} volte</p>";
            echo "<p class='para'>Hai cliccato il link2 {$contatori["link2"]} volte</p>";
            echo "<p class='para'>Hai cliccato il link3 {$contatori["link3"]} volte</p>";
        
        ?>
    </body>
</html>