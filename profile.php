<?php
$title = "Личный кабинет";
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
require "include/connect_db.php";
require "template/header.php";
if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
    $delete = mysqli_query($mysql, "DELETE FROM request WHERE id = {$_GET['del_id']}");
    if ($delete) {
        echo "<p>Успешно удалено.</p>";
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($mysql) . '</p>';
    }
}
$sql = "SELECT * FROM request WHERE user_id=?";
$stmt = mysqli_stmt_init($mysql);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$select = mysqli_query($mysql, 'SELECT *
                            FROM services
                            ORDER BY services.id DESC');
while ($col = mysqli_fetch_assoc($select)) {
    $service[] = $col;
}

?>
<link rel="stylesheet" href="css/modal.css">
<link rel="stylesheet" href="css/transition.min.css">
<link rel="stylesheet" href="css/dimmer.min.css">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/transition.min.js"></script>
<script src="js/dimmer.min.js"></script>
<script src="js/modal.js"></script>

<body class="flex">

    <div class="ui raised very padded text container segment">
        <h2>Личный кабинет</h2>
        <div class="pcolor mb-1 mt-2" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
            <p class="">
                <strong>Ваше имя:</strong>
                <span itemprop="addressLocality"><?= $_SESSION["name"] ?></span>

            </p>
            <p class=""><strong>E-mail:</strong> <span itemprop="email"><?= $_SESSION["email"] ?></span></p>


        </div>

        <div class="ui right very close rail">
            <div class="ui raised segment">
                <h3 class="header">Ваши Заявки</h3>

                <div class="ui cards">

                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="card">
                        <div class="content">
                            <div class="header"><?= $row['name'] ?>
                            </div>
                            <div class="meta mt-2">Услуга: <?= $row['service'] ?> </div>
                            <div class="meta">Дата: <?php $date = date_create($row['date']);
                                                        echo date_format($date, 'd.m.Y'); ?> </div>
                            <h4 class="ui sub header mt-2">Сообщение:</h4>
                            <div class="description"><?= $row['message'] ?>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="header">Контакты </div>
                            <div class="description"><?= $row['phone'] ?></div>
                            <div class="description"><?= $row['email'] ?></div>
                        </div>
                        <a href='?del_id=<?= $row['id'] ?>'><button class="fluid ui red button">Удалить</button></a>
                    </div>
                    <?php } ?>
                </div>
                <?php if (isset($_SESSION['user_id'])) {


                    echo ' <div class="ui tiny  button orange fluid mt-3 mb-0">Оставить заявку</div>';
                } ?>
                <div class="ui standard tiny modal">
                    <div class="header">Заявка </div>
                    <div class="content">
                        <form class="ui form" action="include/increquest.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="field">
                                <label>Ваше имя</label>
                                <input class="form_input" type="text" name="name" placeholder="">
                            </div>
                            <div class="field">
                                <label>Телефон</label>
                                <input class="form_input" type="tel" name="phone" placeholder="">
                            </div>
                            <div class="field">
                                <label>Почта</label>
                                <input class="form_input" type="email" name="email" placeholder="">
                            </div>
                            <div class="field">
                                <label>Выберите услугу</label>
                                <select name="service" class="ui dropdown" id="select">
                                    <?php foreach ($service as $col) { ?>
                                    <option value="<?= $col['name'] ?>"><?= $col['name'] ?></option>
                                    <?php } ?>


                                </select>

                            </div>

                            <div class="field">
                                <label>Дата</label>
                                <input class="form_input" type="date" name="date" placeholder="">
                            </div>

                            <div class="field">
                                <label>Сообщение</label>
                                <textarea rows="5" cols="30" name="message" class="form_input" type="text"></textarea>

                            </div>
                            <button class="ui positive button" type="submit" name="submit">
                                Отправить
                            </button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p></p>
        <p></p>
    </div>

    <script>
    $('.tiny.modal')
        .modal('attach events', '.tiny.button', 'show');
    </script>



    <?php
    require "template/footer.php";
    ?>