<?php
 include_once 'header.php';
?>

<section class="signup-form">
        <h2 class="top"><a style="background-color:#DACCC1;font-size:28px;">Zaloguj się</a></h2>
        <div class="signup-form-form">
            <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Nazwa użytkownika/Email..."></input>
            <input type="password" name="pwd" placeholder="Hasło..."></input>
            <button type="submit" name="submit" style='font-size:18px;'> Zaloguj się</button>
            </form>
        </div>
    <?php
    if (isset($_GET["error"])) {
    $errorCode = $_GET["error"];
    if ($errorCode === "emptyinput") {
        echo "<p style='font-size: 23px; color:red; display: flex;justify-content: center; align-items: center;'>
        <a style='background-color:#DACCC1;'>Uzupełnij wszystkie pola.</a></p>";
    } elseif ($errorCode === "wronglogin") {
        echo "<p style=' font-size: 23px;color:red; display: flex;justify-content: center; align-items: center;'>
        <a style='background-color:#DACCC1;'>Nie prawidłowa nazwa użytkownika.</a></p>";
    }
    elseif ($errorCode === "wrongpassword") {
        echo "<p style='font-size: 23px;color:red; display: flex;justify-content: center; align-items: center;'>
        <a style='background-color:#DACCC1;'>Nie prawidłowe hasło.</a></p>";
    }
    
}
?>
</section>

<?php
 include_once 'footer.php';
?>

  
