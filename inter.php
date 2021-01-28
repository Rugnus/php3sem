<?
    session_start();



?>

<a href="add.php">Добавить экспертную сессию</a>
<a href="edit.php">Редактировать экспертную сессию</a>

<?php
        echo '<a href="?s=yes" id="ssil">Сгенерировать ссылку</a>';
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