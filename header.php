<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href='http://fonts.googleapis.com/css?family=Kotta+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="css/mainStyle.css" />
   
 </head>

 <body>

   <nav class="navbar" >
     <div class="logo"><a href="index.php"><img src="img/logo.png" style="width:200px;"></a></div>
     <ul class="nav-links">
       <input type="checkbox" id="checkbox_toggle" />
       <label for="checkbox_toggle" class="hamburger">&#9776;</label>
       <div class="menu">
        <?php
        if(isset($_SESSION["useruid"])){
          echo '<li><a href="profile.php">Profil</a></li>';
          echo '<li><a href="includes/logout.inc.php">Wyloguj</a></li>';
        }else{
          echo '<li><a href="signup.php">Rejestracja</a></li>';
          echo '<li><a href="login.php">Login</a></li>';
        }
        ?>
       </div>
     </ul>
   </nav>


