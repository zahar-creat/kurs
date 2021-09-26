<?php
$str = 1;
$title = "Услуги";
session_start();
require "include/connect_db.php";
require "template/header.php";


$sql = mysqli_query($mysql, 'SELECT *
                            FROM workers
                            ORDER BY workers.id DESC');
while ($row = mysqli_fetch_assoc($sql)) {
    $posts[] = $row;
}
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
<script src="js/search.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/transition.min.js"></script>
<script src="js/dimmer.min.js"></script>
<script src="js/modal.js"></script>


<body class="flex">
    <div class="ui container">
        <h2 class="header ml-1 ">Наши услуги</h2>
        <div class="ui raised segment">
            <div class="ui right very close rail">
                <div class="ui raised segment">
                    <H3 class="header mb-2">Наши сотрудники</H3>
                    <?php foreach ($posts as $row) { ?>
                        <div class="ui items">
                            <div class="item">
                                <a class="ui tiny image">
                                    <img src="img/<?= $row['file'] ?>">
                                </a>
                                <div class="content">
                                    <a class="header"> <?= $row['firstname'] ?></a>
                                    <div class="description">
                                        <p><?= $row['specification'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if (isset($_SESSION["user_id"])) {
                $one = 'ui three column grid ui tiny';
            } else {
                $one = 'ui three column grid';
            } ?>
            <div class="<?php echo $one; ?>" id="search_result">
                <div class="column ">
                    <div class="ui segment">

                    </div>
                </div>

            </div>



        </div>

    </div>


    <div class="ui standard tiny modal">
        <div class="header">Заявка </div>
        <div class="content">
            <form class="ui form" action="include/increquest.php" method="POST" enctype="multipart/form-data">
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








    <script>
        $('.tiny.modal')
            .modal('attach events', '.tiny', 'show');
    </script>



    <?php
    require "template/footer.php";

    ?>