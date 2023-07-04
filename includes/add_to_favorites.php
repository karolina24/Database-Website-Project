<?php
session_start();

if (isset($_SESSION["userid"]) && isset($_GET["book_id"])) {
    $user_id = $_SESSION["userid"];
    $book_id = $_GET["book_id"];

    require_once 'dbh.inc.php';
    $sql = "SELECT * FROM favorites WHERE user_id = ? AND book_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ii", $user_id, $book_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo "Książka jest już dodana";
            header("Location: ../book.php?book_id=" . $book_id . "&error=alreadyfavorited");
            exit();
        } else {
            $sql = "INSERT INTO favorites (user_id, book_id) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ii", $user_id, $book_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                echo "Książka dodana";
                header("Location: ../index.php?book_id=" . $book_id . "&success=addedtofavorites");
                exit();
            } else {
                echo "Błąd";
                header("Location: ../book.php?book_id=" . $book_id . "&error=stmtfailed");
                exit();
            }
        }
    } else {
        echo "Błąd";
        header("Location: ../book.php?book_id=" . $book_id . "&error=stmtfailed");
        exit();
    }
} else {
    echo "Brak dostępu";
    header("Location: ../index.php?error=invalidaccess");
    exit();
}
