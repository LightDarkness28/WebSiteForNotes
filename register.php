<?php
session_start();
include("db.php");
$login = $_POST['login'];

$password = $_POST['password'];
$email = $_POST['email'];
$md5_password = md5($password . "dfssgsdv2316");

$post = [
    'login' =>  $login,
    'password' => $md5_password,
    'email' => $email
];


$datas = user_login($login);




if (empty($login) || empty($password) || empty($email)) {
    echo "Заполните все поля";
    
} else {

    if ($datas  === array()) {
        

        $_SESSION["id"] = insert('`users`', $post);
        $_SESSION["login"] = $login;

        $_SESSION["email"] = $email;
        header("Location: account.php");
    } else {
        echo "Ошибка: Данный логин занят другим пользователем.";
    }
}
