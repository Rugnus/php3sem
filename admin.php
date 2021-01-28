<?php

    session_start();
    $pass = '12345';
    $err = '';

?>

<div >
    <form action="inter.php" method="post" class="admin-form" style="display: flex !important; flex-direction: column !important;">
        <label for="login" class="form__label">Логин: </label> <input name="login" id="login" type="text" class="form__input" require>
        <label for="pass">Пароль: </label><input name="pass" id="pass" type="password" class="form__input" require>
        <input type="submit" name="sub" class="big-button"  value="Администрирование">

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

<style>

.admin-form {
    margin-top: 5px;
}

.form__input {
    padding: 20px;
    border: 1px solid #a3ddcb;
    border-radius: 15px;
}

.form__input:focus {
    border: 1px solid #ec4646;
    outline: 0;
    outline-offset: 0;
}

.big-button {
    background-color: #f05454;
    border: 1px solid #80ffdb;
    margin-top: 10px;
    color: #333;
    padding: 15px;
    border-radius: 40px;
    transition: all .3s ease-in-out;
    cursor: pointer;
}

.big-button:hover {
    color: #fff;
    background-color: #16c79a;
}

</style>