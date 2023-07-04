<?php
// delete_book.php

session_start();

if (isset($_POST['delete_book'])) {
    if (isset($_SESSION['userid'])) {
        require_once 'dbh.inc.php'; 
        $user_id = $_SESSION['userid'];
        $book_id = $_POST['book_id'];
        $sql = "DELETE FROM favorites WHERE user_id = ? AND book_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "ii", $user_id, $book_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } else {
          
            echo 'Błąd' . mysqli_error($conn);
        }

        mysqli_close($conn); 

   
        header("Location: ../profile.php");
        exit();
    }
}
?>
