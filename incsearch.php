<?php require "include/connect_db.php";
$posts = [];
$search_q = $_GET['search_q'];
function clean($var)
{
    $var = strip_tags($var);
    $var = trim($var);
    $var = str_replace(chr(10), "<br>", $var);
    $var = str_replace(chr(13), "<br>", $var);
    return $var;
}
$search_q = clean($search_q);
$sql = "SELECT * FROM services WHERE name LIKE CONCAT('%',?,'%') OR description LIKE CONCAT('%',?,'%')";
$stmt = mysqli_stmt_init($mysql);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "ss", $search_q, $search_q);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($result)) {
    $posts[] = $row;
}
header("Content-Type: application/json");
echo json_encode($posts);
