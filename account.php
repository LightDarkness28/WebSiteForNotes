<?php
session_start();
include("db.php");
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
                    if (!empty($_SESSION['login'])) { 

                        echo 'Добро пожаловать, '. $_SESSION['login']. '<a href="exit.php">Выход</a>'; 

                        



                    } else { 
                       echo  '<button class="btn" onclick="menu()">Вход в личный кабинет</button>';
                     } ?>

                </div>



            </div>

        </div>




       
<div class="mega">



<?php      
        $notes=user_notes($_SESSION['id']);
       if(!is_null($notes)){
        echo '<div class="account-title">Все записи</div> ';
            foreach ($notes as $item) { 
             
                     echo '<div class="note" ><div class="note-title"> Title: ' . $item['title'] . '</div>' .

                     '<div class="note-text"> Text: ' . $item['text'] .'</div></div>'; 
                     
      }
        }
        else
        {
        echo '<div> нет записей</div>';
        } ?>

    </div>
        <div class="footer">
            ©LightDarkness28
        </div>

    </div>
</body>

</html>