<?php
session_start();
if (isset($_POST['submit'])) {
    require 'connect_db.php';

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $service = $_POST['service'];
    $user_id = $_SESSION['user_id'];
    $date = $_POST['date'];

    function clean($var)
    {
        $var = strip_tags($var);
        $var = trim($var);
        $var = str_replace(chr(10), "<br>", $var);
        $var = str_replace(chr(13), "<br>", $var);
        return $var;
    }
    $name = clean($name);
    $phone = clean($phone);
    $email = clean($email);
    $date = clean($date);
    $service = clean($service);
    $message = clean($message);



    if (empty($name) || empty($email) || empty($phone)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $insert = "INSERT INTO request(
            name,
            phone, 
            email,
            message,
            service,
            date,
            user_id
 
        ) VALUES (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            
            
        )";
        $stmt = mysqli_stmt_init($mysql);
        if (!mysqli_stmt_prepare($stmt, $insert)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                "ssssssi",
                $name,
                $phone,
                $email,
                $message,
                $service,
                $date,
                $user_id


            );
            mysqli_stmt_execute($stmt);
            header("Location: ../profile.php?success=true");
            exit();
        }
    }
}