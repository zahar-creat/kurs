<?php
$title = "Главная";
session_start();
require "include/connect_db.php";
require "template/header.php";

$sql = mysqli_query($mysql, 'SELECT *
                            FROM services
                            ORDER BY services.id DESC');
while ($row = mysqli_fetch_assoc($sql)) {
    $posts[] = $row;
}
?>
<link rel="stylesheet" href="css/chiefslider.css">
<link rel="stylesheet" href="css/carousel.css">
<link rel="stylesheet" href="css/modal.css">
<link rel="stylesheet" href="css/transition.min.css">
<link rel="stylesheet" href="css/dimmer.min.css">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/transition.min.js"></script>
<script src="js/dimmer.min.js"></script>
<script src="js/modal.js"></script>
<script src="js/glide.min.js"></script>



<body class="flex">
    <div class="ui container ">

        <div class="slider" data-slider="chiefslider">
            <div class="slider__container">
                <div class="slider__wrapper">
                    <div class="slider__items">
                        <div class="slider__item">
                            <div class="slider__item-container">
                                <div class="slider__item-content"><img src="img/scale_1201.webp" alt=""></div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="slider__item-container">
                                <div class="slider__item-content"><img src="img/slide3.png" alt=""></div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="slider__item-container">
                                <div class="slider__item-content"><img src="img/ranina_2020-participants.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="slider__item-container">
                                <div class="slider__item-content"><img src="img/scale_1200.webp" alt=""></div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="slider__item-container">
                                <div class="slider__item-content"><img src="img/jesc18_israel-all.jpg" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="slider__control" data-slide="prev"></a>
            <a href="#" class="slider__control" data-slide="next"></a>
        </div>



        <script src="js/chiefslider.js"></script>

        <script>
        const $slider = document.querySelector('[data-slider="chiefslider"]');
        const slider = new ChiefSlider($slider, {
            loop: true
        });
        </script>
        <h1>Празднуйте с нами</h1>
        <div class="ui grid mb-2 mt-4">
            <!-- <div class="four wide column">

            </div> -->
            <div class="twelve wide column">
                <p>Отпразднуйте свои самые драгоценные моменты с «FUNNY». Мы предлагаем услуги по организации
                    свадеб, помолвок, дней рождений, юбилеев, корпоративных вечеринок, выставок и других мероприятий.
                    Определение бюджета, исследование мест, просмотр предложений поставщиков — создание вашего
                    счастливого праздника — сложная работа. </p>
                <p> Свадьбы являются основным направлением в нашем агентстве. Если вы хотите провести этот день необычно
                    и
                    незабываемо, наше агенство — правильный выбор. Фотографы и видеооператоры,
                    которые в короткие сроки предоставят материал с вечеринки, профессиональные МС и артисты. Только
                    здесь
                    вы можете почувствовать себя как в сказке.</p>
                <p>
                    Мы полностью координируем мероприятие и с удовольствием помогаем вам дышать и
                    наслаждаться прекрасным днем. Все, что нужно сделать в этот день, доверить трудности
                    профессиональной
                    команде и просто быть счастливым!</p>
                <?php if (isset($_SESSION['user_id'])) {


                    echo ' <div class="ui tiny  large ui orange button fluid mt-2 mb-0">Оставить заявку</div>';
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
                                    <?php foreach ($posts as $row) { ?>
                                    <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
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
            <div class="one wide column"></div>
            <div class="three wide column ui secondary vertical pointing menu ">

                <a class="item" href="services.php">
                    <h4>Свадьбы</h4>
                </a>
                <a class="item" href="services.php">
                    <h4>Дни рождения</h4>
                </a>
                <a class="item" href="services.php">
                    <h4>Особые праздники</h4>
                </a>
                <a class="item" href="services.php">
                    <h4>Предложение руки и сердца</h4>
                </a>
                <a class="item" href="services.php">
                    <h4>Офицальные мероприятия</h4>
                </a>
                <a class="item" href="services.php">
                    <h4>Корпаративы</h4>
                </a>

            </div>
        </div>



        <h2 class="ui horizontal divider header ">НАПРАВЛЕНИЯ И УСЛУГИ</h2>
        <div class="ui grid mt-3">
            <div class="four wide column text-center">
                <img src="img/activities-5.png" alt="">
                <h3 class="text-center">Офицальные мероприятия</h3>
            </div>
            <div class="four wide column text-center"><img src="img/activities-1.png" alt="">
                <h3 class="text-center">Праздники</h3>
            </div>
            <div class="four wide column text-center"><img src="img/1234.png" alt="">
                <h3 class="text-center">Онлайн праздники</h3>
            </div>
            <div class="four wide column text-center"><img src="img/activities-4.png" alt="">
                <h3 class="text-center">Видео съемка</h3>
            </div>

        </div>
    </div>
    <script>
    $('#select')
        .dropdown();
    </script>
    <script>
    $('.tiny.modal')
        .modal('attach events', '.tiny.button', 'show');
    </script>
    <script>
    $('.slider').glide({
        autoplay: true,
        arrowsWrapperClass: 'slider-arrows',
        arrowRightText: '>',
        arrowLeftText: '<'
    });
    </script>
    <?php
    require "template/footer.php";
    ?>