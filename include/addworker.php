<?php
if (isset($_POST['submit'])) {
    require 'connect_db.php';

    $firstname = $_POST['firstname'];
    $secondname = $_POST['secondname'];
    $specification = $_POST['specification'];
    $description = $_POST['description'];
    $tel = $_POST['tel'];
    $file = $_FILES["file"];

    function clean($var)
    {
        $var = strip_tags($var);
        $var = trim($var);
        $var = str_replace(chr(10), "<br>", $var);
        $var = str_replace(chr(13), "<br>", $var);
        return $var;
    }
    $firstname = clean($firstname);
    $secondname = clean($secondname);
    $specification = clean($specification);
    $description = clean($description);
    $tel = clean($tel);


    require_once('func.php');
    $path = "../img/";
    $upload = upload_image($file, $path);
    if (is_array($upload)) {
        header("Location:../admin_addworker.php?=error=array");
    }





    if (empty($firstname) || empty($specification) || empty($secondname)) {
        header("Location: ../admin_addworker.php?error=emptyfields");
        exit();
    } else {
        $insert = "INSERT INTO workers(
            firstname,
            secondname, 
            specification,
            description,
            file,
            tel
            
            
        ) VALUES (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            
            
        )";
        $stmt = mysqli_stmt_init($mysql);
        if (!mysqli_stmt_prepare($stmt, $insert)) {
            header("Location: ../admin_addworker.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                "ssssss",
                $firstname,
                $secondname,
                $specification,
                $description,

                $upload,
                $tel


            );
            mysqli_stmt_execute($stmt);
            header("Location: ../admin_addworker.php?success=true");
            exit();
        }
    }
}