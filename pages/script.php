<?php


//creo array associativo con i contatori
$contatori = ["link1" => 0, "link2" => 0, "link3" =>0];

//converto l'array associativo in una stringa json
    $stringa_contatori_json = json_encode($contatori);
    

//controllo se il file json con i contatori esiste già, altrimenti lo creo, per sicurezza
if(!file_exists("./contatori.json")){
    
    //inserisco la stringa json nel file
    file_put_contents("./contatori.json",$stringa_contatori_json);

}

/*siccome nell'url del link cliccato è presente l'assegnazione di un valore alla variabile "link", 
e siccome il link utilizza il metodo http GET, posso sapere quale link è stato cliccato e modificare il contatore giusto*/

//recupero il contenuto nel file json come stringa
$stringa_contatori_json = file_get_contents("./contatori.json");

//e lo converto in un array associativo
$contatori = json_decode($stringa_contatori_json, true);// il parametro true mi consente di convertire in array associativo; senza, la stringa sarebbe convertita in oggetto

//recupero il valore "link" dalla superglobale, in modo da capire quale link è stato cliccato
if(isset($_GET["link"])){
$link_cliccato = $_GET["link"];

}else{
  
    header("Location: ../index.php");
    
}
//aumento il contatore utilizzando il valore prelevato da $_GET["link"] e che ho conservato nella variabile $link cliccato
$contatori["$link_cliccato"]++;
//riscrivo i contatori aggiornati sul file json, convertendoli nuovamente in stringa json
$stringa_contatori_json = json_encode($contatori);
file_put_contents("./contatori.json", $stringa_contatori_json);

header("Location: ../index.php");//reindirizzo l'utente all'homepage ad ogni click 
