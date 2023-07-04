<?php
 include_once 'header.php';
?>


<section class="index-intro">
<?php
        if(isset($_SESSION["useruid"])){
          echo '<p style=" display: flex;justify-content: center; align-items: center; font-size:20px;"><a style=" background-color:#DACCC1;">Witaj '. $_SESSION["useruid"] . '!'. '</a></p>';
         }
        ?>

</section>

<link rel="stylesheet" href="css/styleTest.css" /></head>
<div class="papers">
  <p class="quoteDaily"></p>
    <div>
      <p class="quoteDaily"></p>
      <blockquote id="quote">Poznaj zbiór najbardziej inspirujących cytatów</blockquote>
      <cite id="author"></cite>
    <button class="button" onclick="changeQuote(this)">Następny</button>
 </div>
</div>
<script src="script/scriptC.js"></script>
<div id="hello" >
<a style="font-size: 25px; margin-top: 60px; display: block;">
  <span style=" background-color:#DACCC1;">

    Witaj na "Księgozbiorze" – naszej stronie poświęconej niezwykłemu świecie książek!<br><br>
 </span>
  
  <a style="font-size: 18px; ">
  <span style=" background-color:#DACCC1;">
  
 
    Tu, w tym magicznym zakątku internetu, pragniemy podzielić się naszą pasją do czytania i stworzyć przestrzeń, w której miłośnicy literatury mogą czerpać radość z odkrywania, recenzowania i dzielenia się swoimi ulubionymi książkami.

    "Czytanie to podróż, która zabiera nas w niezliczone światy, pozwalając nam doświadczyć niezwykłych historii, spotkać fascynujących bohaterów i zgłębiać tajemnice ludzkiego umysłu. Dlatego właśnie tutaj na "Księgozbiorze" zebraliśmy szeroki wybór książek, z różnych gatunków i epok, aby każdy mógł znaleźć coś dla siebie."
  </span>
  </a>
</div>


  <link rel="stylesheet" href="css/styleNowaT.css" />

<input style="width: 400px; float: right;margin-right: 50px;margin-top:100px;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Wyszukaj tytuł lub autora.." title="Wpisz tytuł książki">

<table id="myTable" >
  <tr class="header">
    <th style="width:20%;"></th>
    <th style="width:20%;">Tytuł</th>
    <th style="width:20%;">Autor</th>
    <th style="width:20%;">
        <?php
        if (isset($_SESSION["userid"])) {
            echo '<a >Dodaj do listy</a>'; 
        }
        ?>
    </th>
   
  </tr>
  <tr>
    <td><a href="ksiazki\PaniEngland.php"><img src="img/ksiazka1.webp"></a></td>
    <td><a href="ksiazki\PaniEngland.php">Pani England</a></td>
    <td><a href="ksiazki\PaniEngland.php">Halls Stacey</a></td>

    <td>
        <?php
        if (isset($_SESSION["userid"])) {
            echo '<a style="font-weight: bold;" href="includes/add_to_favorites.php?book_id=1&title=PaniEngland&author=HallsStacey">Dodaj</a>'; // Replace "1" with the actual book ID
        }
        ?>
    </td>
</tr>
    <td><a href="ksiazki\Legenda.php"><img src="img/ksiazka5.webp"></a></td>
    <td><a href="ksiazki\Legenda.php">Legenda. Tom 1</a></td>
    <td><a href="ksiazki\Legenda.php">Lu Marie</a></td>
    <td>
        <?php
        if (isset($_SESSION["userid"])) {
            echo '<a style="font-weight: bold;" href="includes/add_to_favorites.php?book_id=2&title=PaniEngland&author=HallsStacey">Dodaj</a>'; // Replace "1" with the actual book ID
        }
        ?>
    </td>
  </tr>
  <tr>
    <td><a href="ksiazki\Kawa.php"><img src="img/ksiazka2.webp"></a></td>
    <td><a href="ksiazki\Kawa.php">Zanim wystygnie kawa</a></td>
    <td><a href="ksiazki\Kawa.php">Kawaguchi Toshikazu</a></td>
    <td>
        <?php
        if (isset($_SESSION["userid"])) {
            echo '<a  style="font-weight: bold;" href="includes/add_to_favorites.php?book_id=3">Dodaj</a>'; 
        }
        ?>
    </td>
  </tr>
  <tr>
    <td><a href="ksiazki\Nikt.php"><img src="img/ksiazka3.webp"></a></td>
    <td><a href="ksiazki\Nikt.php">Nikt nie odpisuje</a></td>
    <td><a href="ksiazki\Nikt.php">Eun-jin Jang</a></td>
    <td>
        <?php
        if (isset($_SESSION["userid"])) {
            echo '<a style="font-weight: bold;" href="includes/add_to_favorites.php?book_id=4">Dodaj</a>'; 
        }
        ?>
    </td>
  </tr>
  <tr>
    <td><a href="ksiazki\Gdyby.php"><img src="img/ksiazka4.webp"></a></td>
    <td><a href="ksiazki\Gdyby.php">Gdyby był ze mną</a></td>
    <td><a href="ksiazki\Gdyby.php">Laura Nowlin</a></td>
    <td>
        <?php
        if (isset($_SESSION["userid"])) {
            echo '<a style="font-weight: bold;" href="includes/add_to_favorites.php?book_id=5">Dodaj</a>'; 
        }
        ?>
    </td>
  </tr>
  <tr>
    <td><a href="ksiazki\Warcross.php"><img src="img/ksiazka6.webp"></a></td>
    <td><a href="ksiazki\Warcross.php">Warcross. Cykl Warcross. Tom 1</a></td>
    <td><a href="ksiazki\Warcross.php">Lu Marie</a></td>
    <td>
        <?php
        if (isset($_SESSION["userid"])) {
            echo '<a style="font-weight: bold;" href="includes/add_to_favorites.php?book_id=6">Dodaj</a>'; 
        }
      
      ?>
    </td>
    
  </tr>
  <tr>
    <td><a href="ksiazki\For.php"><img src="img/ksiazka7.webp"></a></td>
    <td><a href="ksiazki\For.php">For Sure Not You</a></td>
    <td><a href="ksiazki\For.php">Weronika Ancerowicz </a></td>
    <td>
        <?php
        if (isset($_SESSION["userid"])) {
            echo '<a style="font-weight: bold;" href="includes/add_to_favorites.php?book_id=7">Dodaj</a>'; 
        }
        ?>
    </td>
  </tr>
  <tr>
    <td><a href="ksiazki\Wave.php"><img src="img/ksiazka8.webp"></a></td>
    <td><a href="ksiazki\Wave.php">The wave</a></td>
    <td><a href="ksiazki\Wave.php">Monika Rutka </a></td>
    <td>
        <?php
        if (isset($_SESSION["userid"])) {
            echo '<a style="font-weight: bold;" href="includes/add_to_favorites.php?book_id=8">Dodaj</a>'; 
        }
        ?>
    </td>
  </tr>
</table>

<script src="script/script.js"></script>




<?php
 include_once 'footer.php';
?>