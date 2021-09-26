<?php
$title = "Контакты";
session_start();
require "template/header.php";

?>

<body class="flex">

    <div class="mt-5">
        <div class="contacts forms">
            <div class="h2" itemscope itemtype="http://schema.org/Organization">


                <h2 class="mt-3 ">Контакты<br></h2>
                <div class="pcolor mb-1 mt-2" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <p class=""><img class="contacts__mini-icons" src="img/contacts-home-icon.png"
                            alt=""><strong>Адрес:</strong>
                        <span itemprop="addressLocality">Омск</span>,
                        <span itemprop="streetAddress">
                            ул. 27 Северная, 69</span>,
                        <span itemprop="postalCode">644116</span>
                    </p>
                    <p class=""><img class="contacts__mini-icons" src="img/contacts-email-icon.png"
                            alt=""><strong>E-mail:</strong> <span itemprop="email">zrogovskiy@gmail.com</span></p>
                    <p class=""><img class="contacts__mini-icons" src="img/contacts-phone-icon.png" alt="">
                        <strong>Телефон: </strong><span class="" itemprop="telephone">+7 3812
                            68-07-73</span>
                    </p>
                    <p class=""><img class="contacts__mini-icons" src="img/contacts-clock-icon.png" alt="">
                        <strong>Время
                            работы:</strong><span class="" itemprop=""> 10:00 - 19:00 пн. -
                            пт.</span>
                    </p>


                </div>

            </div>
        </div>
        <iframe class="mt-4"
            src="https://yandex.ru/map-widget/v1/?um=constructor%3A2941c6ce97a7cd37574a1db58715dda6820bc11978f6c83b4540eaed5fecfa72&amp;source=constructor"
            width="100%" height="720" frameborder="0"></iframe>
    </div>
    <h2 class="ui horizontal divider header">КАК МЫ РАБОТАЕМ</h2>
    <div class="ui container">
        <div class="ui grid ">
            <div class="four wide column text-center">
                <img src="img/how-we-work-1-1.png" alt="">
                <h3 class="text-center">Максимальное погружение в бриф и задачи</h3>
            </div>
            <div class="four wide column text-center"><img src="img/how-we-work-2.png" alt="">
                <h3 class="text-center">Проработка до двух идеи, креативной концепции и сценария</h3>
            </div>
            <div class="four wide column text-center"><img src="img/how-we-work-3.png" alt="">
                <h3 class="text-center">Подбор оптимальных решений цена-качество</h3>
            </div>
            <div class="four wide column text-center"><img src="img/how-we-work-4.png" alt="">
                <h3 class="text-center">Реализация с душой и проффесиональным подходом</h3>
            </div>
        </div>
    </div>


    <?php
    require "template/footer.php";
    ?>