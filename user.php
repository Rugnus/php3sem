<?
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        li {
            list-style: none;
            list-style-type: none;
        }
        header a {
            color: #fff;
            text-decoration: none;
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
</head>
<body>
    
    

    <header>
        <img src="img/лого.jpg" alt="" id="logo">
        <ul class="header__menu">
            <li><a href="index.php">Главная</a></li>
            <li><a href="#">Информация</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
        
    </header>

    <main style="display:flex;
                 flex-direction: column;
                 justify-content:center;
                 align-items:center;
                "
    
    
    >
        <h3>Форма ответов</h3>
        <form method="post" action="" style="border:1px solid black;padding: 20px; display: flex; flex-direction: column; width: 300px;">
            <label for="num"></label><input type="number" name="num" id="num" placeholder="Ответ в виде цифр" require style="margin-top: 10px;">
            <input type="number" name="plusNum" placeholder="Ответ в виде положит. цифр" pattern="[0-9]" require style="margin-top: 10px;">
            <input type="text" name="strokaAnswer" placeholder="Ответ до 30 символов" require pattern="[A-Za-zА-Яа-яЁё]{1,30}" style="margin-top: 10px;">
            <input type="text" name="textAnswer" placeholder="Ответ до 255 символов" require pattern="[A-Za-zА-Яа-яЁё]{1,255}" style="margin-top: 10px;">
            <select name="onceAnsw" id="" style="margin-top: 10px;">
                <option value="1">Да</option>
                <option value="2">Нет</option>
                <option value="3">Не знаю</option>
            </select>
            <select name="mulAnsw" id="" multiple style="margin-top: 20px;">
                <option value="1">Россия</option>
                <option value="2">Беларусь</option>
                <option value="3">США</option>
            </select>
            <input type="submit" name="button" value="Ответить">
        </form>
    </main>
    

    <?php
        if (isset($_POST['button']) && $_POST['button'] == 'Ответить') {
            $link = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');
            $_SESSION['link'] = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');

                if(mysqli_connect_errno()) {
                    echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
                }

                $res = 'Нет';

                $sel_q = "SELECT Question from example1";
                $sel_res = mysqli_query($link, $sel_q) or die("Ошибка " . mysqli_error($link));
                $sel_data = mysqli_fetch_all($sel_res);

                // УДАЛЕНИЕ ТАБЛИЦЫ ПРИ ВВОДЕ НОВЫХ ОТВЕТОВ 
                $drop_table = "DROP TABLE answers;";
                $drop_res = mysqli_query($link, $drop_table) or die("Ошибка " . mysqli_error($link));


                // СОЗДАНИЕ ТАБЛИЦЫ С НУЛЯ ПРИ ВВОДЕ НОВЫХ ОТВЕТОВ
                $create_table = "CREATE TABLE answers(
                    id INT NOT NULL,
                    Question text NOT NULL,
                    результат Char(15),
                    Баллы INT(11)
                );";
                $res_create = mysqli_query($link, $create_table) or die("Ошибка " . mysqli_error($link));


                // ВВОД НОВЫХ ЗНАЧЕНИЙ В ТАБЛИЦУ
                $query = "INSERT INTO answers VALUES 
                (999, '".$sel_data[5][0]."', 'Без ответа', Баллы = 0),(009, '".$sel_data[1][0]."', 'Без ответа', Баллы = 0),(8, '".$sel_data[0][0]."', 'Без ответа', Баллы = 0),(5, '".$sel_data[3][0]."', 'Без ответа', Баллы = 0),
                (666, '".$sel_data[4][0]."', 'Без ответа', Баллы = 0),(333, '".$sel_data[2][0]."', 'Без ответа', Баллы = 0);";
                
                $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));



                if ($_POST['num'] == 7) {
                    $nuresres = 'Правильно';
                    $numres = "UPDATE answers SET результат='Правильно', Баллы = 1 WHERE id = 999;";
                    $numresult = mysqli_query($link, $numres) or die("Ошибка " . mysqli_error($link));
                } else {
                    $nuresres = 'Неправильно';
                    $numres = "UPDATE answers SET результат='Неправильно', Баллы = 0 WHERE id = 999;";
                    $numresult = mysqli_query($link, $numres) or die("Ошибка " . mysqli_error($link));
                }
                if($_POST['plusNum'] == 18) {
                    $nresres = 'Правильно';
                    $numberres = "UPDATE answers SET результат='Правильно', Баллы = 3 WHERE id = 009;";
                    $numberresult = mysqli_query($link, $numberres) or die("Ошибка " . mysqli_error($link));
                } else {
                    $nresres = 'Неправильно';
                    $numberres = "UPDATE answers SET результат='Неправильно', Баллы = 0 WHERE id = 009;";
                    $numberresult = mysqli_query($link, $numberres) or die("Ошибка " . mysqli_error($link));
                }
                if($_POST['strokaAnswer'] == 'Четыре') {
                    $sresres = 'Правильно';
                    $srtres = "UPDATE answers SET результат='Правильно', Баллы = 5 WHERE id = 8;";
                    $strresult = mysqli_query($link, $srtres) or die("Ошибка " . mysqli_error($link));
                } else {
                    $sresres = 'Неправильно';
                    $strres = "UPDATE answers SET результат='Неправильно', Баллы = 0 WHERE id = 8;";
                    $strresult = mysqli_query($link, $srtres) or die("Ошибка " . mysqli_error($link));
                }
                if($_POST['textAnswer'] == 'Да') {
                    $tresres = 'Правильно';
                    $txtres = "UPDATE answers SET результат='Правильно', Баллы = 11 WHERE id = 5;";
                    $txtresult = mysqli_query($link, $txtres) or die("Ошибка " . mysqli_error($link));
                } else {
                    $tresres = 'Неправильно';
                    $txtres = "UPDATE answers SET результат='Неправильно', Баллы = 0 WHERE id = 5;";
                    $txtresult = mysqli_query($link, $txtres) or die("Ошибка " . mysqli_error($link));
                }
                if($_POST['onceAnsw'] == 1) {
                    $oresres = 'Правильно';
                    $onceres = "UPDATE answers SET результат='Правильно', Баллы = 2 WHERE id = 666;";
                    $onceresult = mysqli_query($link, $onceres) or die("Ошибка " . mysqli_error($link));
                } else {
                    $oresres = 'Неправильно';
                    $onceres = "UPDATE answers SET результат='Неправильно', Баллы = 0 WHERE id = 666;";
                    $txtresult = mysqli_query($link, $onceres) or die("Ошибка " . mysqli_error($link));
                }
                if($_POST['mulAnsw'] == 'Да') {
                    $mulres = "UPDATE answers SET результат='Правильно', Баллы = 15 WHERE id = 333;";
                    $mresres = 'Правильно';
                    $mulresult = mysqli_query($link, $mulres) or die("Ошибка " . mysqli_error($link));
                } else {
                    $mresres = 'Неравильно';

                    $mulres = "UPDATE answers SET результат='Неправильно', Баллы = 0 WHERE id = 333;";
                    $mulresult = mysqli_query($link, $mulres) or die("Ошибка " . mysqli_error($link));
                }


                
                
                // if ($_POST['onceAnsw'] == 1) {
                //     $query .= 'UPDATE answers SET Баллы = "45" WHERE id="666;"';
                // }
                // if ($_POST['mulAnsw'] == 1 && $_POST['mulAnsw'] == 2) {
                //     $query .= 'UPDATE answers SET Баллы = "55" WHERE id="333;"';
                // } 

                                

                if($result) {
                    echo '<span style="margin: 1rem auto; color: red;">Ответы были зачтены!</span>';
                    echo '<div style="display: flex; justify-content: center; margin-top: .5rem;">';

                    $link = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');
                    $_SESSION['link'] = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');

                    $final_query = "SELECT Question, результат, Баллы FROM answers";
                    $fin_res = mysqli_query($link, $final_query);

                    $fin_data = mysqli_fetch_all($fin_res);

                    echo '<table>';

                        for ($i=0; $i< count($fin_data); $i++){

                            echo '<tr>';
                            for ($o=0; $o<count($fin_data[$i]);$o++) {
                                echo '<td>'.$fin_data[$i][$o].'</td>';                        
                            }
                            echo '</tr>';
                        }
                    echo '</table>';
                    echo '</div>';

                    echo '<div style="display: flex; justify-content: center; margin-top: 5rem;"> Средний балл:';

                    $avg_q = "SELECT avg(Баллы) FROM answers";
                    $avg_res = mysqli_query($link, $avg_q);
                    $avg_data = mysqli_fetch_all($avg_res);

                    echo '<table>';

                        for ($i=0; $i< count($avg_data); $i++){

                            echo '<tr>';
                            for ($o=0; $o<count($avg_data[$i]);$o++) {
                                echo '<td>'.$avg_data[$i][$o].'</td>';                        
                            }
                            echo '</tr>';
                        }
                    echo '</table>';

                    echo '</div>';

                    

                    echo '<div style="display: flex; justify-content: center; margin-top: 1rem;"> Суммарный балл:';

                    $sum_q = "SELECT SUM(Баллы) FROM answers";
                    $sum_res = mysqli_query($link, $sum_q);
                    $sum_data = mysqli_fetch_all($sum_res);

                    echo '<table>';

                        for ($i=0; $i< count($sum_data); $i++){

                            echo '<tr>';
                            for ($o=0; $o<count($sum_data[$i]);$o++) {
                                echo '<td>'.$sum_data[$i][$o].'</td>';                        
                            }
                            echo '</tr>';
                        }
                    echo '</table>';

                    echo '</div>';

                    if(mysqli_connect_errno()) {
                        echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
                    }

                }
        }
    
        
    ?>

</body>
</html>

