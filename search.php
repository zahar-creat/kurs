<?php

require "include/connect_db.php";
require "template/header.php"
?>

<body class="flex">
    <div class="ui container">
        <div class="ui fluid action input">
            <input type="text" id="search" placeholder="Поиск..." oninput="search()">
            <div class="ui button" onclick="search()">Поиск</div>
        </div>
        <h2 class="header ml-1 ">Наши услуги</h2>
        <div class="ui relaxed grid mt-2" id="search_result">

        </div>

    </div>


    <script src="js/search.js"></script>
    <?php

    require "template/footer.php"

    ?>