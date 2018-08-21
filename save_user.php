<meta charset="utf-8">
<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
 $password = stripslashes($password);
    $password = htmlspecialchars($password);
 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
 // проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    //print_r($result);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
 // если такого нет, то сохраняем данные
    $result2 = 'TRUE';
    switch ($password) { // проверяем на наличие нативного пароля
        case "qwerty":
            $result2 = "FALSE";
            echo "Нативный пароль".'<br />';
            break;
        case "password":
            $result2 = "FALSE";
            echo "Нативный пароль".'<br />';
            break;
        case "123456":
            $result2 = "FALSE";
            echo "Нативный пароль".'<br />';
            break;
    }
    switch ($login) { // проверяем на наличие нативного пароля
        case "administrator":
            $result2 = "FALSE";
            echo "Логин недоступен".'<br />';
            break;
        case "moderator":
            $result2 = "FALSE";
            echo "Логин недоступен".'<br />';
            break;
        case "lodhel":
            $result2 = "FALSE";
            echo "Логин недоступен".'<br />';
            break;
    }
    if ($result2=='TRUE') {
        if ((strlen($login) > 2) and (strlen($password) > 5)) { // проверяем на длину вводиммых данных
            $result2 = mysql_query("INSERT INTO users (login,password) VALUES('$login','$password')");
        }
    }
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
        file_put_contents('users.txt', "Логин: ".$login." "."Пароль: ".$password);//  записывай в файл тхт
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?>