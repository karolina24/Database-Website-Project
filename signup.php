<?php
 include_once 'header.php';
?>

<section class="signup-form">
        <h2 class="top"><a style="background-color:#DACCC1;font-size:28px;">Zarejestruj się</a></h2>
        <div class="signup-form-form">
            <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Pełne imię..."></input>
            <input type="text" name="email" placeholder="Email..."></input>
            <input type="text" name="uid" placeholder="Nazwa użytkownika..."></input>
            <input type="password" name="pwd" placeholder="Hasło..."></input>
            <input type="password" name="pwdrepeat" placeholder="Powtórz hasło..."></input>
            <button type="submit" name="submit" style='font-size:18px;'> Zarejestruj się</button>
            </form>
        </div>
        <?php
if (isset($_GET["error"])) {
    $errorCode = $_GET["error"];
    if ($errorCode === "emptyinput") {
        echo "<p style='font-size: 23px; color:red; display: flex;justify-content: center; align-items: center;'>
        <a style='background-color:#DACCC1;'>Uzupełnij wszystkie pola.</a></p>";
    } elseif ($errorCode === "invaliduid") {
        echo "<p style='font-size: 23px; color:red; display: flex;justify-content: center; align-items: center;'>
        <a style='background-color:#DACCC1;'> Nie prawidłowa nazwa użytkownika.</a></p>";
    } elseif ($errorCode === "none") {
        echo "<p style='font-size: 23px;color:blue; display: flex;justify-content: center; align-items: center;'>
        <a style='background-color:#DACCC1;'>Twoje konto zostało utworzone!</a></p>";
    }elseif ($errorCode === "usernametaken") {
        echo "<p style='font-size: 23px; color:red; display: flex;justify-content: center; align-items: center;'>
        <a style='background-color:#DACCC1;'>Taki użytkownik już istnieje.</a></p>";
    }elseif ($errorCode === "invalidemail") {
        echo "<p style='font-size: 23px; color:red; display: flex;justify-content: center; align-items: center;'>
        <a style='background-color:#DACCC1;'>Nie prawidłowy adres email.</a></p>";
    }elseif ($errorCode === "passwordsdontmatch") {
        echo "<p style='font-size: 23px; color:red; display: flex;justify-content: center; align-items: center;'>
        <a style='background-color:#DACCC1;'>Hasła się nie zgadzają.</a></p>";
    }
}
?>
</section>
<?php
 include_once 'footer.php';
?>