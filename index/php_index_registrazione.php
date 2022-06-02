<?php

    //sessione
    session_start();




    //dati presi fal form dell'index
    $nome = $_POST["nome"];
    $cognome = $_POST ["cognome"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //modificarlo per fare la query di inserimento nel db se utente inesistente
    try
    {
        $connection = new PDO("mysql:host=localhost;dbname=progetto_personale","root","");

        $query_controllo = "SELECT"


        $query_controlloNO = "SELECT * FROM promemoria, utente WHERE utente.email = $email AND utente.password = $password";
        $result = $connection->query($query);
        if( $result->fetchColumn() > 0)
        {
            $message = "esiste già un utente con queste credenziali";
            echo "
                <script type='text/javascript'>
                    alert('$message');
                </script>";
            header("location: index.html");
        }
        $query = "SELECT * FROM promemoria, utente WHERE utente.email = $email AND utente.password = $password";
        $result = $connection->query($query);
        if( $result->fetchColumn() > 0)
        {
            header("location: ../calendario/Calendario.html");
            exit;
        }
        else
        {
            $query = "INSERT INTO `utente` (`nome`, `cognome`, `email`, `password`) VALUES ($nome, $cognome, $email, $password)";
            header("location: calendario/Calendario.html");
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