<?php
    //dati presi fal form dell'index
    //$nome = $_POST["nome"];
    $cognome = $_POST ["cognome"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    //connessione al database
    $hostd = "127.0.0.1";
    $userd = "root";
    $passwordd = "";
    $database = "PROGETTO_PERSONALE";
    $connessione = new mysqli($hostd, $userd, $passwordd, $database);
    if ($connessione === false)
    {
        die("errore di connessione: " . $connessione->connect_error);
    }



    $nome = $connessione-›real_escape_string($_REQUEST['nome']);
    $cognome = $connessione-›real_escape_string($_REQUEST['cognome']);
    $email = $connessione-›real_escape_string($_REQUEST['email']);
    $password = $connessione-›real_escape_string($_REQUEST['password']);




    //controllo se esiste già un utente con quelle credenziali
    $cerca = "SELECT *  FROM `Utente` WHERE `email` LIKE \'$email\';";
    if($cerca === true)
    {
        header("Location: /index/index.html");
    }
    else
    {
        $sql = "INSERT INTO `Utente` (`nome`, `cognome`, `email`, `password`) VALUES ($nome, $cognome, $email, $password);";
    }

    //chiusura della connessione
    $connessione->close();
?>