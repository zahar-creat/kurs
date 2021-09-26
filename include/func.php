<?php
function check_upload($file)
{
    $errors = [];
    if ($file['name'] == '') {
        $errors[] = 'Вы не выбрали файл.';
    }
    // Ограничение размера на 1.5мб
    if ($file['size'] > 1572864) {
        $errors[] = 'Файл слишком большой.';
    }
    $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
    $types = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];
    if (!in_array($ext, $types)) {
        $errors[] = 'Недопустимый тип файла.';
    }
    return (empty($errors)) ? true : $errors;
}
function make_upload($file, $path)
{
    $name = mt_rand(0, 100000) . $file['name'];
    copy($file['tmp_name'], $path . $name);
    return $name;
}

function upload_image($file, $path)
{
    $result = check_upload($file);
    if (is_array($result)) {
        return $result;
    }
    return make_upload($file, $path);
}
