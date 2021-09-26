<?php
$title = "Админ панель";
session_start();
if ($_SESSION["status"] != 228) {
    header("Location: index.php");
    exit();
}
require "include/connect_db.php";
require "template/header.php";
?>


<body class="flex">
    <div class="ui container">
        <div class="ui grid mt-5">

            <div class="three wide column">
            </div>
            <div class="six wide column forms">
                <?php if ($_GET['success'] ?? null) { ?>

                <div class="ui success message">
                    <i class="close icon"></i>
                    <div class="header">Вы успешно добавили сотрудника </div>

                </div>

                <?php } ?>
                <h2>Добавить работника</h2>
                <form class="ui form" action="include/addworker.php" method="POST" enctype="multipart/form-data">
                    <div class="field">
                        <label>Имя работника</label>
                        <input class="form_input" type="text" name="firstname" placeholder="">
                    </div>
                    <div class="field">
                        <label>Фамилия работника</label>
                        <input class="form_input" type="text" name="secondname" placeholder="">
                    </div>
                    <div class="field">
                        <label>Спецификация</label>
                        <input type="text" name="specification" placeholder="">
                    </div>
                    <div class="field">
                        <label>Телефон</label>
                        <input type="tel" name="tel" placeholder="">
                    </div>
                    <div class="field">
                        <label>Описание</label>
                        <input type="text" name="description" placeholder="">

                    </div>
                    <div class="field">
                        <label>Фото</label>
                        <input type="file" name="file" id="file" placeholder="">
                    </div>
                    <button class="ui positive button" type="submit" name="submit">
                        Добавить
                    </button>

                </form>
            </div>
            <div class="two wide column"></div>


            <div class="three wide column ui secondary vertical pointing menu">
                <h3 class="header text-center offices">Админ панель</h3>
                <a class="item" href="admin_listrequest.php">
                    <h4>Просмотр заявок</h4>
                </a>
                <a class="item" href="admin_listworker.php">
                    <h4>Просмотр работников</h4>
                </a>
                <a class="item" href="admin_addworker.php">
                    <h4>Добавление работника </h4>
                </a>
                <a class="item" href="admin_addservices.php">
                    <h4>Добавление услуг</h4>
                </a>
            </div>
        </div>
    </div>
    </div>





    <?php
    require "template/footer.php"; ?>