<html>
    <head>
    <title>Регистрация</title>
    <meta charset="utf-8">
    </head>
    <body>
    <h2>Регистрация</h2>
    <form action="save_user.php" method="post">
    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
<p>
    <label>Ваш логин:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>
<!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
<p>
    <label>Введите Ваш пароль<br />или скопируйте сгенерированный случайно пароль,<br />не потеряйте его:<br />
        <strong>
            <?php
                $str = 'qwertyuiopasdfghjklzxcvbnm0123456789'; //все латинские буквы
                $newStr = str_shuffle($str); //перемешиваем их
                $password = substr($newStr, 0, 8); //берем первые 8 символов
                echo $password;
            ?>
        </strong>
    <br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
<p>
    <input type="submit" name="submit" value="Зарегистрироваться">
<!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->
</p></form>
    </body>
    </html>