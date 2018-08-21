<?php

"<meta charset=utf-8>";
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
$visit_counter = 0;
if (isset($_COOKIE['visitCounter']) &&
is_numeric($_COOKIE['visitCounter'])){
    $visit_counter = $_COOKIE['visitCounter']*1;
}

$visit_counter++;
echo "посетило: ".$visit_counter.'<br />';
//file_put_contents('users.txt', "Логин: ".$login." "."Пароль: ".$password);/
$last_visit = '';
if (isset($_COOKIE['lastVisit'])){
    $last_visit=htmlspecialchars($_COOKIE['lastVisit'],
    ENT_QUOTES);
    $last_visit=stripslashes(trim($last_visit));
}
    setcookie ('visitCounter', $visit_counter, 0x7FFFFFFF) ;
    setcookie ('lastVisit', date ('d/m/Y H:i:s'), 0x7FFFFFFF);

if($visit_counter == 1) {
    print ' < h2>Добро пожаловать!</h2 > ';
} else {
    print <<<HTML
<h2> Вы здесь уже $visit_counter раз</h2>
<p>Последнее сообщение: $last_visit</p>
HTML;

}

?>
    <html>
    <head>
    <title>Главная страница</title>
    <meta charset="utf-8">
    </head>
    <body>
    <h2>Главная страница</h2>
    <form action="testreg.php" method="post">

    <!--****  testreg.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
 <p>
    <label>Ваш логин:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>


    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->

    <p>

    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>

    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->

    <p>
    <input type="submit" name="submit" value="Войти">

    <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** -->
<br>
 <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** -->
<a href="reg.php">Зарегистрироваться</a>
    </p></form>
    <br>
    <?php
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // Если пусты, то мы не выводим ссылку
    echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
    }
    else
    {

    // Если не пусты, то мы выводим ссылку
    echo "Вы вошли на сайт, как ".$_SESSION['login']."<br><a  href='http://tvpavlovsk.sk6.ru/'>Эта ссылка доступна только  зарегистрированным пользователям</a>";
    }
    ?>
    </body>