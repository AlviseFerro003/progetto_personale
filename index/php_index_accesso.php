<?php
    //dati presi dal form dell'index
    $email = $_POST["emailL"];
    $password = $_POST["passwordLogin"];

    try
    {
        //sul mac
        //$connection = new PDO("mysql:host=localhost;dbname=PROGETTO_PERSONALE","root","");
        
        // sulla macchina virtuale del sito
        $connection = new PDO("mysql:host=localhost;dbname=progetto_personale","root","");

        $query = "SELECT * FROM promemoria, utente WHERE utente.email = $email AND utente.password = $password";
        $result = $connection->query($query);
        if( $result->fetchColumn() > 0)
        {
            header("location: ../calendario/Calendario.html");
            exit;
        }
        else
        {
            echo ("utente non trovato");
            header("location: index.html");
            exit;
        }
        $result->closeCursor();
        $connection = NULL;
    }
    catch (PDOException $exception)
    {
        echo "errore di accesso al db";
        die;
    }
?>