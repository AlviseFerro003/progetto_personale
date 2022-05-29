<?php
    //dati presi fal form dell'index
    $nome = $_POST["nome"];
    $cognome = $_POST ["cognome"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    //modificarlo per fare la query di inserimento nel db se utente inesistente
    try
    {
        $connection = new PDO("mysql:host=localhost;dbname=PROGETTO_PERSONALE","root","");
        $query_controllo = "SELECT * FROM Promemoria, Utente WHERE Utente.email = $email AND Utente.password = $password";
        $result = $connection->query($query);
        if( $result->fetchColumn() > 0)
        {
            $message = "esiste già un utente con queste credenziali";
            echo "
                <script type='text/javascript'>
                    alert('$message');
                </script>";
            header("location: index.html");
            exit;
        }
        else
        {
            $query = "INSERT INTO `Utente` (`nome`, `cognome`, `email`, `password`) VALUES ($nome, $cognome, $email, $password)";
            header("location: calendario/Calendario.html");
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