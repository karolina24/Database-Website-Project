<?php
session_start();
if (isset($_SESSION["userid"])) {
    require_once 'includes\dbh.inc.php';
    $user_id = $_SESSION["userid"];
    $sql = "SELECT * FROM favorites WHERE user_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $book_id = $row['book_id'];
            echo '<p>ID książki: ' . $book_id . '</p>';
            echo '<br>';
        }
        mysqli_stmt_close($stmt);
    } else {
        echo 'Wystąpił błąd: ' . mysqli_error($conn);
    }
    mysqli_close($conn); 
} else {
    echo 'Użytkownik nie zalogowany.';
}
?>
