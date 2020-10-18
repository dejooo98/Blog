<?php session_start(); ?>
<?php
        $mysqli = new mysqli('localhost','root','','accounts');
        $sql = 'SELECT id,mesage,vreme_poruke FROM user_message';
        $result = $mysqli->query($sql);

?>
<?php
        $mysqli = new mysqli('localhost','root','','accounts');
        $sql = 'SELECT email,vrijeme_prijavljivanja FROM users';
        $resultss = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/form2.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">

<title>| Dobrodosli |</title>
</head>
<body>
  <div class="container">
<div class="header">
  <a href="#Pocetna" class="logo">MaDdoxX</a>
  <div class="header-right">
    <a href="users.php">Prijavljeni korisnici</a>
    <a  href="logout.php" class="logoutbtn"> ODJAVITE SE</a>
  </div>
</div>
<!-- Preloader -->
     <div class="load">
      <hr/><hr/><hr/><hr/>
  </div>

<div class="cardd">
      <h2>Objava</h2>
	  <?php 
    $poruka = '';
    $id = '';
	  
		if (isset($_GET['edit'])) {
			$mysqli = new mysqli('localhost','root','','accounts');
		
			$id = $_GET['edit'];
			$update = true;
			
			$sql = "SELECT * FROM user_message WHERE id=$id";
			
			$edit = $mysqli->query($sql);
		
		
			while ($row = $edit->fetch_assoc()){
        $poruka = $row['mesage'];
        $id = $row['id'];
			}
		}
		
	  ?>
        <form action="<?php echo $poruka ? 'edit.php' : 'blog.php'; ?>" method="POST">
            <input type="text" class='mesage' placeholder="Unesite vasu poruku..." name="mesage" value="<?php if($poruka) echo $poruka; ?>"></textarea>
            <input type="hidden" name="id" value="<?php echo $poruka ? $id : ''; ?>">
              <input type="reset" value="Obrisi" class="button">
			  
			  <?php
				if($poruka) echo ' <button>Izmeni</button>';
				if(!$poruka) echo ' <button>Objavi</button>';
			  ?>
             
        </form>
    </div>
<div class="row">
  <div class="column">
    <div class="card">
    <h2>Objave korisnika</h2>
      <div class="fakeimgg" style="height:300px;">
      <img src='<?= $_SESSION['avatar'] ?>' id="imageuser">
      
      <p class="p"> Dobrodosli! <span class="user"><?= $_SESSION['username'] ?></span></p>
      
      <!-- <?php 
          while ($row = $resultss->fetch_assoc()){
            echo "<div class='vrijeme_prijavljivanja'>$row[vrijeme_prijavljivanja]<br /></div>";
        }
        ?> -->
      
      <div class="fakeimg" style="height:auto;">
     
      <?php 
          while ($row = $result->fetch_assoc()){ ?>
		  
			<div class='vreme_poruke'><?php echo $row['vreme_poruke']; ?><br /></div>
		  
            <?php echo "$row[mesage]"; ?><br />
			
			<a href=./welcome.php?edit=<?php echo $row['id']; ?> class="edit_btn" > Edit</a>

       <?php  }
        ?>
    </div>
      </div>
      
      
    </div>
    
   
  </div>
  
</div>
</div>
<div class="footer">
<p> Copyrights @2020</p>
</div>
 <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
		<script >
		// preloader
		$(window).on ('load',function () {
			$('.load').fadeOut("slow");
		});

		</script
  
        
        
</body>
</html>
