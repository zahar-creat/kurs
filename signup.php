<?php
session_start();
$title = "Регистрация";
require "include/connect_db.php";
require "template/header.php";
if (!empty($_GET)) {
    if (!empty($_GET["error"])) {
        switch ($_GET["error"]) {
            case "emptyfields":
                $fields = "<h5 style='color:red ;'>Не все поля заполнены</h5>";
                break;
            case "regfailpass":
                $wrongp = "<h5 style='color:red ;'>В пароле могут быть только символы<br>A-Z, Цифры от 0-9, символы _-</h5>";
                break;
            case "reffaillogin":
                $wrongl = "<h5 style='color:red ;'>В логине могут быть только символы<br>  A-Z, Цифры от 0-9 и символы _-</h5>";
                break;
            case "regfailemail":
                $wronge = "<h5 style='color:red ;'>E-mail неверный</h5>";
                break;
            case "passnotmatch":
                $passnot = "<h5 style='color:red ;'>Пароли не совпадают</h5>";
                break;
            case "mysqlerror":
                $server1 = "<h5 style='color:red ;'>Ошибка на сервере, попробуйте позже</h5>";
                break;
            case "mysqlerror":
                $server2 = "<h5 style='color:red ;'>Ошибка на сервере, попробуйте позже</h5>";
                break;
            case "mysqlerrornotexist":
                $loginexist = "<h5 style='color:red ;'>Такой логин уже существует</h5>";
                break;
            case "mysqlerrorserver":
                $server3 = "<h5 style='color:red ;'>Ошибка на сервере, попробуйте позже</h5>";
                break;
            case "mysqlerroremailexist":
                $emailexist = "<h5 style='color:red ;'>Такая почта уже существует</h5>";
                break;
            case "mysqlerrorserver2":
                $server4 = "<h5 style='color:red ;'>Ошибка на сервере, попробуйте позже</h5>";
                break;
        }
    }
}
?>

<body class="flex">
    <div class="ui container">

        <div class="ui grid mt-5">
            <div class="six wide column">
            </div>
            <div class="six wide column forms">
                <h2 class="">Регистрация</h2>
                <form class="ui form" action="include/incsignup.php" method="POST">
                    <div class="field">
                        <label>ФИО</label>
                        <input type="text" name="name" placeholder="ФИО">
                    </div>
                    <div class="field">
                        <label>Почта</label>
                        <input type="text" name="email" placeholder="Почта">
                    </div>
                    <div class="field">
                        <label>Логин</label>
                        <input type="text" name="login" placeholder="Логин">
                    </div>
                    <div class="field">
                        <label>Пароль</label>
                        <input type="password" name="pass" placeholder="Пароль">
                    </div>
                    <div class="field">
                        <label>Подтверждение пароля</label>
                        <input type="password" name="passconf" placeholder="Подтверждение пароля">
                    </div>
                    <div class="ui checkbox">
                        <input type="checkbox" name="example">
                        <label><a
                                href="http://www.consultant.ru/document/cons_doc_LAW_61801/6c94959bc017ac80140621762d2ac59f6006b08c/">Согласие
                                на обработку персональных данных</a></label>
                    </div>
                    <?php echo ($fields ?? "") ?>
                    <?php echo ($wrongp ?? "") ?>
                    <?php echo ($wrongl ?? "") ?>
                    <?php echo ($wronge ?? "") ?>
                    <?php echo ($server1 ?? "") ?>
                    <?php echo ($server2 ?? "") ?>
                    <?php echo ($loginexist ?? "") ?>
                    <?php echo ($server3 ?? "") ?>
                    <?php echo ($emailexist ?? "") ?>
                    <?php echo ($server4 ?? "") ?>
                    <p class="">Если у вас уже есть аккаунта то <a href="login.php">войдите</a>
                    </p>

                    <button class="ui positive  button" type="submit" value="reg" name="submit">
                        Регистрация
                    </button>

                </form>
            </div>
        </div>
    </div>


</body>

<?php
require "template/footer.php";
?>