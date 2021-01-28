<?php

    session_start();
    $pass = '12345';
    $err = '';

?>

<div >
    <form action="inter.php" method="post" class="admin-form" style="display: flex !important; flex-direction: column !important;">
        <label for="login" class="form-label">Логин: </label> <input name="login" id="login" type="text" class="form-input" require>
        <label for="pass">Пароль: </label><input name="pass" id="pass" type="password" require>
        <input type="submit" name="sub" value="Администрирование">

    </form>
</div>
    

<?php

    if (isset($_POST['button']) && $_POST['button'] == 'Администрирование') {
        if ($_POST['pass'] == 12345 && $_POST['login'] == 'admin') {
            header("Location: inter.php");
        } else {
            echo 'Вы ввели непрвильный пароль!';
        }



    }

?>
