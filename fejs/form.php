<?php 
    session_start();
    $_SESSION['message'] = '';

    $mysqli = new mysqli('localhost','root','','accounts');
  
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {       
        //provjera da li se passwordi podudaraju
        if ($_POST['password'] == $_POST['confirmpassword']) {
          $username = $mysqli->real_escape_string($_POST['username']);
          $email = $mysqli->real_escape_string($_POST['email']);
          $tip = $mysqli->real_escape_string($_POST['tip']);
          $password = md5($_POST['password']);
          $avatar_path = $mysqli->real_escape_string('image/'.$_FILES['avatar']['name']);

          //fajlovi moraju biti tipa slike
          if (preg_match("!image!", $_FILES['avatar']['type'])) {
            
          //copy image to images folder    
            if (copy($_FILES['avatar']['tmp_name'], $avatar_path)) {
              $_SESSION['username'] = $username;
              $_SESSION['avatar'] = $avatar_path;

              $sql = "INSERT INTO users (username, email, password, avatar, tip) " 
              . "VALUES ('$username','$email','$password','$avatar_path','$tip')";

              //ako je upit tacan preusmjeri nas na pocetnu stranicu
              if ($mysqli->query($sql) === true) {
                $_SESSION['message'] = "Registracija uspjesna! Dodali ste korisnika $username u bazu!";
                header("location: welcome.php");
              }
              else {
                $_SESSION['message'] = "Korisnik nije dodat u bazu!";
              }
            }
            else {
              $_SESSION['message'] = "Fajl nije dodat!"; 
            }
          }
          else {
            $_SESSION['message'] = "Molimo Vas dodajte samo datoteke tipa GIF, JPG, or PNG!";
          }
    }
    else {
      $_SESSION['message'] = "Vase lozinke se ne podudaraju!";
    }
    }
    else {
      $_SESSION['message'] = "Izaberite tip prijavljivanja!";
    }
    
?>
 
