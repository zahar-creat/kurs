<?php


$title = "Войти";
session_start();
require "template/header.php"; // подключаем шапку проекта
require "include/connect_db.php";

?>
<?php
if (!empty($_GET)) {
    if (!empty($_GET["error"])) {
        switch ($_GET["error"]) {
            case "emptyfields":
                $emptyfields = "<h6 style='color:red ;'>Не все поля заполнены</h6>";
                break;
            case "sqlerror":
                $servererror = "<h6 style='color:red ;'>Ошибка на сервере</h6>";
                break;
            case "wrongpass":
                $passn = "<h6 style='color:red ;'>Пароль неверный</h6>";
                break;
        }
    }
}
?>

<link rel="stylesheet" href="css/style1.css">

<body class="flex">
    <div class="ui container">
        <div class="ui grid mt-5">
            <div class="six wide column">
            </div>
            <div class="six wide column forms">
                <h2>Войти</h2>
                <form class="ui form" action="include/inclogin.php" method="POST">
                    <div class="field">
                        <label>Логин</label>
                        <input class="form_input" type="text" name="login" placeholder="Логин">
                    </div>
                    <div class="field">
                        <label>Пароль</label>
                        <input type="password" name="pass" placeholder="Пароль">
                    </div>
                    <p class="mt-2">Если у вас еще нет аккаунта то <a href="signup.php">зарегистрируйтесь</a>
                    </p>
                    <?php echo ($emptyfields ?? "") ?>
                    <?php echo ($servererror ?? "") ?>
                    <?php echo ($passn ?? "") ?>
                    <button class="ui positive button" type="submit" value="reg" name="submit">
                        Войти
                    </button>

                </form>
            </div>
        </div>
    </div>
    <?php
    require "template/footer.php";
    ?>