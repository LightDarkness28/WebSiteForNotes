<?php
session_start();
include("db.php");
$title = $_POST['title'];
$text = $_POST['text'];





$post = [
    'title' => $title,
     'text' => $text,
    'id_user'=> $_SESSION['id']
    
];





        insert('`notes`', $post);
        header("Location: note.php");