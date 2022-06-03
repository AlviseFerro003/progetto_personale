<?php

    //sessione
    //session_start();

    //dati presi fal form dell'index
    $nome = $_POST["nome"];
    $cognome = $_POST ["cognome"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //modificarlo per fare la query di inserimento nel db se utente inesistente
    try
    {
        $connection = new PDO("mysql:host=localhost;dbname=progetto_personale","root","");
        $query_controllo = "SELECT * FROM promemoria, utente WHERE utente.email = $email AND utente.password = $password";        
        $result = $connection->query($query_controllo);
        if( $result == true )
        {
            $message = "esiste già un utente con queste credenziali";
            echo "
                <script type='text/javascript'>
                    alert('$message');
                </script>";
            header("location: index.html");
        }
        else
        {
            $query_inserimento = "INSERT INTO `utente` (`nome`, `cognome`, `email`, `password`) VALUES ('Lorenzo', 'Ferro', 'ferro.lorenzo.3@gmail.com', 'ciao')"
            header("location: ../calendario/Calendario.html");
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