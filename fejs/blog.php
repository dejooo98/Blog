<?php 
    //parametri za vezu

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $baza = 'accounts';

    //ostvarivanje veze
    
    $konekcija = mysqli_connect($server, $user, $password, $baza);
    
    //provjera konekcije
    if (!$konekcija) {
        // echo "Provjeri parametre veze";
        die("Program je prestao sa radom" . mysqli_connect_error());
    }else {
        echo "Konekcija je uspjesna <br><hr>";
        header("Refresh:2;url=welcome.php");
    }

    // Preuzimanje podataka iz forme
	
	
    $mesage = $_POST['mesage'];

    //Definicija naredbe podataka
    
    $sql_komanda = "INSERT INTO user_message (id, mesage)
            VALUES (NULL, '$mesage')";

    //Izvrsavanje naredbe
           
    if (mysqli_query($konekcija, $sql_komanda)) {
        echo "SQL komanda je uspjela <br>";
    }else {
        echo "Komanda" . $sql_komanda . "nije uspjela zbog" . mysqli_error($konekcija);
    }       

	
?>