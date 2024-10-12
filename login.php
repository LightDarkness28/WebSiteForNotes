<?php
session_start();
include('db.php');


$password = $_POST['password'];
$email = $_POST['email'];
$md5_password = md5($password . "dfssgsdv2316");




$datas2 = user_email_and_password($md5_password, $email);


tt($datas2);
if ($datas2  != array()) {
   

    $_SESSION["id"] = $datas2[0]['id'];
    $_SESSION["login"] = $datas2[0]['login'];
    $_SESSION["email"] = $email;


    header("Location: /login/account.php");
} else {
    echo "Ошибка: Такого пользователя нет в базе данных или данные введены неверно";
}
