<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./css/form3.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">

<title>| Svi prijavljeni korisnici |</title>
</head>
<div class="header">
  <a href="#Pocetna" class="logo">MaDdoxX</a>
  <div class="header-right">
    <a href="welcome.php">Pocetna</a>
  </div>
</div>
        <?php

        $mysqli = new mysqli('localhost','root','','accounts');
        $sql = 'SELECT username, avatar, email, tip FROM users';
        $result = $mysqli->query($sql);

        ?>
        <?php

        $mysqli = new mysqli('localhost','root','','accounts');
        $sql = 'SELECT mesage FROM user_message';
        $results = $mysqli->query($sql);

        ?>

        <div id="registered">
          <h2 class="regtittle">Svi prijavljeni korisnici</h2>
            <?php 
                while ($row = $result->fetch_assoc()){
                    echo "<div class='userlist'>Username: <span>$row[username]</span><br />";
                    echo "<div class='userlist'>Email: <span>$row[email]</span><br />";
                    echo "<div class='tip'>$row[tip]<br />";       
                    echo "<img src='$row[avatar]'></div>";         
                  }
            ?>
            <?php 
                while ($row = $results->fetch_assoc()){
                    echo "<div class='mesage'>Objave korisnika: <span>$row[mesage]</span><br />";
                }
            ?>
            
        </div>
        </div>
<?php session_start(); ?>