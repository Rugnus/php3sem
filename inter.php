<?
    session_start();



?>

<header style="

            display: flex;
            justify-content: space-evenly;
            width: 100%;
            height: 9rem;
            background-color: #424874;
            font-size: 1.7rem;
            color: #fff;
            z-index: 1;"
>
        <img src="img/лого.jpg" alt="" id="logo">
        <ul class="header__menu" style="list-style: none;
            display: flex;
            align-items: center;
            justify-content: space-around;
            list-style-type: none;">
            <li style="margin-right: 3rem;"><a href="index.php" style="color: #fff; text-decoration: none;">Главная</a></li>
            <li style="margin-right: 3rem;"><a href="inter.php" style="color: #fff; text-decoration: none;">Редактировать</a></li>
            <li style="margin-right: 3rem;"><a href="user.php" style="color: #fff; text-decoration: none;">Форма</a></li>
        </ul>
</header>


<div class="inter" style=
    "
        max-width: 100% !important;
        min-height: 100vh !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
        align-items: center !important;
    "
            
>

    <h1>Администрирование</h1>
    <a href="edit.php" class="inter__button" style="
        margin-top: 5px; 
        color: #333; 
        padding: 12px; 
        border: 1px solid #888; 
        border-radius: 15px; 
        text-decoration: none !important; 
        background-color: #c9cbff;" 
    >
    Редактировать</a>

    <?php

            if (isset($_POST['logout'])) {
                unset($_SESSION['user']);
                header('Location: admin.php');
                exit();
            }


            echo ' <a href="?s=yes" id="ssil" style="margin-top: 5px; cursor:pointer; color: #333; padding: 12px; border: 1px solid #888; border-radius: 15px; text-decoration: none !important; background-color: #c9cbff;">Сгенерировать ссылку</a>';
            // echo '<a href="?s=yes" id="ssil" class="inter__button" name="s" style="margin-top: 5px; color: #333; padding: 12px; border: 1px solid #888; border-radius: 15px; text-decoration: none !important; background-color: #c9cbff;" >Сгенерировать ссылку</a>';
            echo '<a href="/?logout=" style="margin-top: 25px; color: #333; padding: 12px; border: 1px solid #888; border-radius: 15px; text-decoration: none !important; background-color: #ff4646;" class="inter__button">Выйти</a>';
            $link = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');


            $_SESSION['randomZnach'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $_SESSION['newSilka'] = str_shuffle($_SESSION['randomZnach'], 12);


            if (isset($_GET['s'])) {
                
                $link = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');
                $_SESSION['link'] = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');

                    if(mysqli_connect_errno()) {
                        echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
                    }

                $_SESSION['ssilka'] = rand(10000000, 90000000);
                
                $URLlength = 8;
                $charray = array_merge(range('a','d'), range('0','5'));
                $max = count($charray) - 1;
                for ($i = 0; $i < $URLlength; $i++) {
                    $randomChar = mt_rand(0, $max);
                    $url .= $charray[$randomChar];
                }

                $query = "INSERT INTO urls (`URL`) VALUES ('php3semphp.std-961.ist.mospolytech.ru/user.php/{$url}')";

                $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

                if($result) {

                    echo 'Ссылка создана';
                    echo '<a sstyle="margin-top: 25px; color: #333; padding: 12px; border: 1px solid #888; border-radius: 15px; text-decoration: none !important; background-color: #ff4646;" class="inter__button" href="http://examphp.std-961.ist.mospolytech.ru/user.php/'.$url.'>Ссылка</a>';

                }



                
            }

    ?>

</div>

<style>

        .session__button {
            max-width: 100% !important;
            min-height: 100vh !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
        }

        .inter__button {
            padding: 12px;
            border: 1px solid #888;
            border-radius: 15px;
        }

        li {
            list-style: none;
            list-style-type: none;
        }

        header {
            display: flex;
            justify-content: space-evenly;
            width: 100%;
            height: 9rem;
            background-color: #424874;
            font-size: 1.7rem;
            color: #fff;
            z-index: 1;
        }
        header a {
            color: #fff;
            text-decoration: none;
        }

        header .header__menu {
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: space-around;
            list-style-type: none;
        }

        .header__menu li {
            margin-right: 3rem;
        }

        header h1 {
            margin-top: 2rem;
        }

        #logo {
            margin-left: 5rem;
            justify-self: center;
            /* position: absolute; */
            padding: 1rem 3rem;
            width: 7rem;
            height: 7rem;
            cursor: pointer;
        }


</style>
