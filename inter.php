<?
    session_start();



?>

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
    <a href="add.php" style="margin-top: 5px; color: #333; padding: 12px; border: 1px solid #888; border-radius: 15px; text-decoration: none !important; background-color: #c9cbff;" >Добавить экспертную сессию</a>
    <a href="edit.php" class="inter__button" style="margin-top: 5px; color: #333; padding: 12px; border: 1px solid #888; border-radius: 15px; text-decoration: none !important; background-color: #c9cbff;" >Редактировать экспертную сессию</a>

    <?php

            if (isset($_POST['logout'])) {
                unset($_SESSION['user']);
                header('Location: admin.php');
                exit();
            }



            echo '<a href="?s=yes" id="ssil" class="inter__button" style="margin-top: 5px; color: #333; padding: 12px; border: 1px solid #888; border-radius: 15px; text-decoration: none !important; background-color: #c9cbff;" >Сгенерировать ссылку</a>';
            echo '<a href="/?logout=" style="margin-top: 25px; color: #333; padding: 12px; border: 1px solid #888; border-radius: 15px; text-decoration: none !important; background-color: #ff4646;" class="inter__button">Выйти</a>';
            $link = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');


            $_SESSION['randomZnach'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $_SESSION['newSilka'] = str_shuffle($_SESSION['randomZnach'], 12);


            if (!isset($_GET['s'])) {
                $_SESSION['ssilka'] = rand(10000000, 90000000);

                echo '<a style="color:#000" href="http://examphp.std-961.ist.mospolytech.ru/user.php/'.$_SESSION['newSilka'].'>Ссылка</a>';

                $query = "INSERT INTO urls VALUES (".$_SESSION['newSilka'].")";

                $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

                if($result) {
                    echo 'Данные были успешно введены!';
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

</style>
