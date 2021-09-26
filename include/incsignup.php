<?php
require "connect_db.php";
function clean($var)
{
    $var = strip_tags($var);
    $var = trim($var);
    $var = str_replace(chr(10), "<br>", $var);
    $var = str_replace(chr(13), "<br>", $var);
    return $var;
}
if ($_POST["submit"] == "reg") {
    $name = clean($_POST["name"]);
    $login = clean($_POST["login"]);
    $pass = clean($_POST["pass"]);
    $passconf = clean($_POST["passconf"]);
    $email = clean($_POST["email"]);
    if (empty($login) || empty($pass) || empty($passconf) || empty($email) || empty($name)) {
        header("Location: ../signup.php?error=emptyfields");
        exit();
    } else if (!preg_match("/^[A-Za-z0-9_-]*$/", $pass)) {
        header("Location: ../signup.php?error=regfailpass");
        exit();
    } else if (!preg_match("/^[A-Za-z0-9_-]*$/", $login)) {
        header("Location: ../signup.php?error=regfaillogin");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=regfailemail");
        exit();
    } else if ($pass != $passconf) {
        header("Location: ../signup.php?error=passnotmatch");
        exit();
    } else {
        $sql = "SELECT login FROM user WHERE login=?";
        $stmt = mysqli_stmt_init($mysql);
        //Init -> prepare -> bind -> execute ->> store_resurt ->>> num_rows
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=mysqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $login);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $rows = mysqli_stmt_num_rows($stmt);
            if ($rows != 0) {
                header("Location: ../signup.php?error=mysqlerrornotexist");
                exit();
            } else {
                $sql = "SELECT email FROM user WHERE email=?";
                $stmt = mysqli_stmt_init($mysql);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=mysqlerrorserver");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    $rows = mysqli_stmt_num_rows($stmt);
                    if ($rows != 0) {
                        header("Location: ../signup.php?error=mysqlerroremailexist");
                        exit();
                    } else {
                        $sql = "INSERT INTO user (name, login, pass, email) VALUES(?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init($mysql);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../signup.php?error=mysqlerrorserver2");
                            exit();
                        } else {
                            $hashpass = password_hash($pass, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ssss", $name, $login, $hashpass, $email);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../login.php?success=true");
                            exit();
                        }
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($mysql);
    }
} else {
    mysqli_close($mysql);
    header("Location: ../index.php");
}
