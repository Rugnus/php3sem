<?php

    session_start();
    // $pass = '12345';
    $err = '';

?>


<!-- <div >
    <form action="inter.php" method="post" class="admin-form" style="display: flex !important; flex-direction: column !important;">
        <label for="login" class="form__label">Логин: </label> <input name="login" id="login" type="text" class="form__input" require>
        <label for="pass">Пароль: </label><input name="pass" id="pass" type="password" class="form__input" require>
        <button name="sub" class="big-button" >Войти</button>

    </form>
</div> -->
    

<?php

    // if (isset($_POST['button']) and $_POST['button'] == 'Администрирование' and $_POST['pass'] == 12345 and $_POST['login'] == 'admin') {

    //     // if ($_POST['pass'] === 12345 && $_POST['login'] === 'admin') {
    //         header("Location: inter.php");
    //     } 
    // else if(isset($_POST['button']) and $_POST['button'] == 'Администрирование' and $_POST['pass'] != 12345 and $_POST['login'] != 'admin') {
    //     echo 'Вы ввели непрвильный пароль!';
    // }
    if (isset($_POST['logout'])) {
        unset($_SESSION['user']);
        header('Location: /');
        exit();
    }
    
    if (!isset($_SESSION['user']) && isset($_POST['login']) && isset($_POST['password']) && $f = fopen('users.csv', 'rt')) {
        while(!feof($f)) {
            $test = explode(';', fgets($f));
            if(trim($test[0]) == $_POST['login']) {
                if(isset($test[1]) && trim($test[1] == $_POST['password'])) {
                    $_SESSION['user'] = $test;
                    header('Location: /');
                    exit();
                }
                else {
                break;
                }
            }
        }
        echo '<div>Неверный логин или пароль!</div>';
        fclose($f);
    }
    else if (!isset($_SESSION['user'])) {
        echo '
                <form action="inter.php" class="admin-form">
                <label for="login">Логин: </label><input type="text" class="form__input" placeholder="Логин" id="login" value="'.$_COOKIE['cooklog'].'">
                <label for="password" style="margin-top: 18px;" id="passlb">Пароль: </label><input type="password" class="form__input" placeholder="Пароль" id="password" value="'.$_COOKIE['cookpass'].'">
                <input type="submit" value="Войти" class="big-button">
                </form>
            ';
    } else if($_POST['password'] == 12345 and $_POST['login'] == 'sungur') {
        $cooklog = $_POST['login'];
        $cookpass = $_POST['pass'];
        setcookie($cooklog, $cookpass, time() + 86400);
        echo '<a href="/?logout=">Выйти</a>';
        echo '<p>Привет, '.$_SESSION['user']['name'].'</p>';
        include('inter.php');
    }


?>

<style>

.admin-form {
    margin-top: 5px;
}

.form__input {
    padding: 20px;
    border: 1px solid #a3ddcb;
    border-radius: 20px !important;
}

.form__input:focus {
    border: 1px solid #ec4646;
    outline: 0;
    outline-offset: 0;
}

.big-button {
    background-color: #f05454;
    border: none;
    margin-top: 10px;
    color: #333;
    padding: 15px;
    border-radius: 40px;
    transition: all .3s ease-in-out;
    cursor: pointer;
    -webkit-box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.32);
    -moz-box-shadow:    0px 7px 11px 0px rgba(50, 50, 50, 0.32);
    box-shadow:         0px 7px 11px 0px rgba(50, 50, 50, 0.32);
}

.big-button:hover {
    color: #fff;
    background-color: #16c79a;
}


body {
    max-width: 100% !important;
    min-height: 100vh !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: center !important;
    align-items: center !important;
}
</style>