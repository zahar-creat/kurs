<?php
if (isset($_POST['submit'])) {
    require 'connect_db.php';
    $name = $_POST['name'];
    $description = $_POST['description'];
    $file = $_FILES["file"];
    function clean($var)
    {
        $var = strip_tags($var);
        $var = trim($var);
        $var = str_replace(chr(10), "<br>", $var);
        $var = str_replace(chr(13), "<br>", $var);
        return $var;
    }
    $name = clean($name);
    $description = clean($description);
    require_once('func.php');
    $path = "../img/";
    $upload = upload_image($file, $path);
    if (is_array($upload)) {
        header("Location:../admin_addservices.php?=error=array");
    }
    if (empty($name) || empty($description)) {
        header("Location: ../admin_addservices.php?error=emptyfields");
        exit();
    } else {
        $insert = "INSERT INTO services(
            name,
            description,
            file
        ) VALUES (
            ?,
            ?,
            ?
        )";
        $stmt = mysqli_stmt_init($mysql);
        if (!mysqli_stmt_prepare($stmt, $insert)) {
            header("Location: ../admin_addservices.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                "sss",
                $name,
                $description,
                $upload
            );
            mysqli_stmt_execute($stmt);
            header("Location: ../admin_addservices.php?success=true");
            exit();
        }
    }
}