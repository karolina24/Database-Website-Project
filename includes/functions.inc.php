<?php

function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $pwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $user_id = mysqli_insert_id($conn);
        $sql = "INSERT INTO favorites (user_id) VALUES (?)";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        header("location: ../signup.php?error=none");
        exit();
    } else {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
}


function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat) {
  $result ="";
  if(empty($name) || empty($email) ||  empty($username) || empty($pwd) || empty($pwdRepeat)){
      $result = true;
  }else{
      $result = false;
  }
  return $result;
}

function invalidUid($username) {
  $result = "";
  if (!preg_match("/^[a-zA-Z0-9]*$/",$username)){
      $result = true ;
  }
  else{
      $result = false;
  }
  return $result;
}



function invalidMatch($pwd, $pwdRepeat) {
  $result = "";
  if($pwd !== $pwdRepeat){
      $result = true;
  }else{
      $result = false;
  }
  return $result;
}
function invalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}



function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row;
    }

    mysqli_stmt_close($stmt);
    return false;
}

function emptyInputLogin($username, $pwd) {
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function loginUser($conn, $username, $pwd) {
    $userData = uidExists($conn, $username, $username); 

    if ($userData === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $storedPwd = $userData["usersPwd"];

    if ($pwd !== $storedPwd) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    } else {
        session_start();
        $_SESSION["userid"] = $userData["usersId"];
        $_SESSION["useruid"] = $userData["usersUid"];
        header("location: ../index.php");
        exit();
    }
}