<?php



session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Создание заметки</title>
</head>

<body>

    <div class="megalovana">
        <div class='header'>
            <div class='container'>
                <div class='header-line'>



                    <div class='nav'>
                        <a class='nav-item' href="index.php">ГЛАВНАЯ</a>
                        <?php if (!empty($_SESSION['login'])) { ?>
                            <a class='nav-item' href="note.php">СОЗДАТЬ ЗАМЕТКУ</a>
                            <a class='nav-item' href="account.php">ВСЕ ЗАМЕТКИ</a>
                        <?php } ?>
                    </div>
                    <?php
                    if (!empty($_SESSION['login'])) { ?>

                        <?php echo ("Добро пожаловать, " . $_SESSION['login']); ?>

                        <a href="exit.php">Выход</a>



                    <?php } else { ?>
                        <button class="btn" onclick="menu()">Вход в личный кабинет</button>
                    <?php } ?>




                    <div class="sign-up-content" id="sign-up-content">
                        <span class="close" onclick="cclose()">&times;</span>
                        <div class="form-box">
                            <div id="btn"></div>

                            <button type="button" class="toggle-btn" onclick="login()">Вход</button>
                            <button type="button" class="toggle-btn" onclick="register()">Регистрация</button>



                            <form action="login.php" id="login" method="post" class="input-group">
                                <input type="text" class="input-field" placeholder="login" name="login" required>
                                <input type="text" class="input-field" placeholder="Пароль" name="password" required>
                                <input type="checkbox" class="checkbox"><span>Запомнить пароль</span>
                                <button type="submit" class="submit-btn">Вход</button>
                            </form>

                            <form action="register.php" id="register" method="post" class="input-group">
                                <input type="text" class="input-field" placeholder="Email" name="email" required>
                                <input type="text" class="input-field" placeholder="Логин" name="login" required>
                                <input type="text" class="input-field" placeholder="Пароль" name="password" required>
                                <button type="submit" class="submit-btn">Регистрация</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    </div>

    </div>
    <div class="main">
        <div class="container">
            <div class="area1">

                <form action="btn-save.php" method="post" class="area">
                    <div class="title-arena">
                        <div class="title1">Заголовок<br></div>
                        <textarea name="title" class="title" type="text" id="ta" placeholder="Введите текст заголовока" rows="2" cols="80" maxlength="152"></textarea>
                    </div>

                    <div class="text-arena">
                        <div class="text">Текст<br></div>
                        <textarea name="text" class="letter" type="text" id="sha" placeholder="Введите текст заметки" rows="30" cols="80" maxlength="2280"></textarea>
                    </div>

                    <div class="buttons_container">
                        <button class="btn-save" type="submit">Сохранить</button>
                        <button action="btn-clear.php" class="btn-clear" type="submit" onclick="clean()">Отчистить</button>
                </form>

            </div>
        </div>
    </div>
    </div>



    <div class="footer">
        ©LightDarkness28
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function cclose() {
            document.getElementById('sign-up-content').style.display = 'none';

        }

        function menu() {
            document.getElementById('sign-up-content').style.display = 'block';
            login();
        }

        function register() {
            x.style.left = "100%";
            y.style.left = "15%";
            z.style.left = "47%";

        }



        function login() {
            x.style.left = "15%";
            y.style.left = "100%";
            z.style.left = "17%";

        }

        function clean() {
            document.getElementById("ta").value = "";
            document.getElementById("sha").value = "";
        };
    </script>

</body>

</html>