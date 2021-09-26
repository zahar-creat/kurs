<?php
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/semantic.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/icon.min.css" />
    <link rel="stylesheet" href="css/mt.css">
    <link type="image/x-icon" rel="shortcut icon" href="img/prazdnik.ico">
    <script href="js/dropdown.min.js"></script>
    <script href="js/semantic.min.js"></script>
    <script href="js/main.js"></script>
    <script href="js/jquery-3.5.1.min.js"></script>
    <title><?= $title ?></title>
</head>
<header>
    <div class="ui fixed borderless huge menu">
        <div class="ui container grid">
            <div class="computer only row">
                <a class=" " href="index.php"><img class="logo mt-2" src="img/logo.png" alt=""></a>
                <a class="item" href="index.php"> <strong> Главная</strong></a>
                <a class="item" href="services.php"><strong> Услуги</strong></a>
                <a class="item" href="contacs.php"><strong>Контакты</strong></a>
                <div class="right menu">
                    <?php if (isset($str)) {
                        echo '<div class="item">';
                        echo '<div class="ui icon input transparent inverted">';
                        echo '<input type="text" placeholder="Поиск" oninput="search()" id="search">';
                        echo '<i class="search icon link" onclick="search()"></i>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    <div class="ui simple dropdown item"><i class="user icon"></i> <i class="dropdown icon"></i>
                        <div class="menu inverted">
                            <?php if (isset($_SESSION['user_id'])) {
                                echo '<div class="item"><a class="" href="profile.php">Личный кабинет</a></div>';
                                echo '<div class="item"><a class="" href="logout.php">Выйти</a></div>';
                                if ($_SESSION['status'] == 228) {
                                    echo '<div class="item"><a class="" href="admin_listrequest.php">Админ панель</a></div>';
                                }
                            } else {
                                echo '<div class="item"><a class="" href="login.php">Войти</a></div>';
                                echo '<div class="item"><a class="" href="signup.php">Регистрация</a></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>