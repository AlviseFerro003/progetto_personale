<?php
    //dati presi fal form dell'index
<<<<<<< HEAD
    $nome = $_POST["nome"];
=======
    //$nome = $_POST["nome"];
>>>>>>> 88e1a4ce9198932b79cd4a46eccc4fcf8e87f8e3
    $cognome = $_POST ["cognome"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
<<<<<<< HEAD
=======

>>>>>>> 88e1a4ce9198932b79cd4a46eccc4fcf8e87f8e3
    //modificarlo per fare la query di inserimento nel db se utente inesistente
    try
    {
        $connection = new PDO("mysql:host=localhost;dbname=PROGETTO_PERSONALE","root","");
<<<<<<< HEAD
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
=======
        $query = "SELECT * FROM Promemoria, Utente WHERE Utente.email = $email AND Utente.password = $password";
        $result = $connection->query($query);
        if( $result->fetchColumn() > 0)
        {
            header("location: ../calendario/Calendario.html");
>>>>>>> 88e1a4ce9198932b79cd4a46eccc4fcf8e87f8e3
            exit;
        }
        else
        {
<<<<<<< HEAD
            $query = "INSERT INTO `Utente` (`nome`, `cognome`, `email`, `password`) VALUES ($nome, $cognome, $email, $password)";
            header("location: calendario/Calendario.html");
=======
            echo ("utente non trovato");
            header("location: index.html");
>>>>>>> 88e1a4ce9198932b79cd4a46eccc4fcf8e87f8e3
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
<<<<<<< HEAD
=======




/*


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
    */
>>>>>>> 88e1a4ce9198932b79cd4a46eccc4fcf8e87f8e3
?>