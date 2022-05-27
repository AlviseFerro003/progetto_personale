<?php
    //dati presi dal form dell'index
    $email = $_POST["emailL"];
    $password = $_POST["passwordLogin"];

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "progetto_personale";



    /*
        questa è la query pdo
        guardare il seguente video per capire
        https://youtu.be/x_2koTcxdDg
    */
/*
    $sql = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
*/



    $connessione = new mysqli($host, $user, $password, $database);
    if ($connessione === false)
    {
        die("errore di connessione: " . $connessione->connect_error);
    }
    $sql = "SELECT * FROM Utente WHERE email = '" . $email . "';";
	$result = $connessione->query($sql);
	
	//https://www.w3schools.com/php/php_mysql_select.asp
	
    if($result === false)
    {
        echo "non è stato trovato nessun utente";
    }
    else
    {
		echo "trovato utente";
        //header("Location: /calendario/Calendario.html");
    }


    $nome = $connessione-›real_escape_string($_REQUEST['nome']);



    $connessione->close();
?>
<!--connessione al database:   https://howto.webarea.it/php/come-effettuare-una-connessione-a-mysql-tramite-php-utilizzando-estensione-mysqli-o-pdo-o-mysql-functions_213-->