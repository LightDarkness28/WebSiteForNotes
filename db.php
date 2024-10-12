<?php
//данные для коннекта к базе данных
$driver = 'mysql';
$host = 'localhost:3306';
$db_name = "webnotessite";
$db_user = 'root';
$db_pass = '';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

//проверка коннекта
try {
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user,
        $db_pass,
        $options
    );
} catch (PDOException $i) {
    die("Ошибка подключения к базе данных");
}


//проверка выполнения запроса к бд
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit;
    }
}


/*function get_user($table, $params)
{
    global $pdo;
    $sql = "SELECT * FROM  $table";
    $i = 0;
   /* foreach ($params as $key => $value) {
        if (!is_numeric($value)) {
            $value = "'" . $value . "'";
        }
        if ($i === 0)*{
            $sql = $sql . " WHERE $key=$value";
        } else {
            $sql = $sql . " AND $key=$value";
        }
        $i++;
    }

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
    return $query->fetch();
}*/

function tt($value)
{
    printf("<pre>%s</pre>", print_r($value, true));
}

//вставка в бд строки
function insert($table, $params)
{
    global $pdo;
    $i = 0;
    $columns = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $columns = $columns . "$key";
            $mask = $mask . "'$value'";
        } else {
            $columns = $columns . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($columns) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}

//проверка пользователя
function user_login($login)
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM `users` WHERE login='$login'");

    $data = $stmt->fetchAll();

    return $data;
}

function user_email_and_password($md5_password , $email)
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM `users` WHERE password = '$md5_password' AND email = '$email' ");
tt($stmt);

    return  $stmt->fetchAll();

}

function user_id($password, $login)
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM `users` WHERE password='$password' AND login='$login'");

    $data = $stmt->fetchAll();

    return $pdo->lastInsertId();
}


//достать записи пользователя
function user_notes($id)
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM `notes` WHERE id_user='$id'");

    $data = $stmt->fetchAll();

    return $data;
}




