<?php
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
            <li style="margin-right: 3rem;"><a href=inter.php style="color: #fff; text-decoration: none;">Редактировать</a></li>
            <li style="margin-right: 3rem;"><a href="user.php" style="color: #fff; text-decoration: none;">Форма</a></li>
        </ul>
</header>

<div class="edit_forms" style="display:flex; flex-direction:row; flex-wrap: wrap; margin-top: 5rem; justify-content: center;">

    <form  action="edit.php" method="post" class="insert_form" style="display: flex;
                                                                            flex-direction: column;
                                                                            border: 1px solid black;
                                                                            border-radius: 5px;
                                                                            padding: 10px;
                                                                            max-width: 300px;"
    >
        <fieldset><legend>Добавление сессии</legend>
        <label for="nazv">Название для экспертной сессии</label><input name="nazv" id="nazv" type="text" placeholder="Название сесии">
        <input type="submit" name="button" value="Добавить сессию">
        </fieldset>
    </form>

    <form action="edit.php" method="post" class="insert_form" style="display: flex;
                                                                            flex-direction: column;
                                                                            border: 1px solid black;
                                                                            border-radius: 5px;
                                                                            padding: 10px;
                                                                            max-width: 300px;"
    >
        <fieldset><legend>Добавление вопроса</legend>
            <input type="text" placeholder="Название существующей сессии" name="sessionName">
            <input type="number" placeholder="Введите id" name="id">
            <input type="text" placeholder="Введите вопрос" name="question">
            <input type="text" placeholder="Введите ответ" name="answer">
            <input type="submit" name="button" value="Добавить вопрос">
        </fieldset>
        
    </form>

    <form action="edit.php" method="post" class="insert_form" style="display: flex;
                                                                            flex-direction: column;
                                                                            border: 1px solid black;
                                                                            border-radius: 5px;
                                                                            padding: 10px;
                                                                            max-width: 300px;"
    >
        <fieldset><legend>Редактирование сессии</legend>
            <input type="text" placeholder="Название существующей сессии" name="sessionName">
            <input type="number" placeholder="Введите id" name="id">
            <input type="text" placeholder="Введите вопрос" name="question">
            <input type="text" placeholder="Введите ответ" name="answer">
            <input type="submit" name="button" value="Ввести значения">
        </fieldset>
        
    </form>

    <form action="edit.php" method="post" class="insert_form" style="display: flex;
                                                                            flex-direction: column;
                                                                            border: 1px solid black;
                                                                            border-radius: 5px;
                                                                            padding: 10px;
                                                                            max-width: 300px;
                                                                            margin-left: 10px;"
    >
        <fieldset><legend>Удалить сессию</legend>
            <input type="text" placeholder="Наименование сессии" name="delName">
            <input type="submit" value="Удалить сессию" name="button" style="margin-top: 65px;">
        </fieldset>
    </form>

    <form action="edit.php" method="post" class="insert_form" style="display: flex;
                                                                            flex-direction: column;
                                                                            border: 1px solid black;
                                                                            border-radius: 5px;
                                                                            padding: 10px;
                                                                            max-width: 300px;
                                                                            margin-left: 10px;"
    >
        <fieldset><legend>Удалить вариант ответа</legend>
            <input type="text" placeholder="Наименование сессии" name="delName">
            <input type="text" placeholder="Индентификатор вопроса" name="Qid">
            <input type="submit" value="Удалить вариант ответа" name="button" style="margin-top: 65px;">
        </fieldset>
    </form>

    <form action="edit.php" method="post" class="insert_form" style="display: flex;
                                                                            flex-direction: column;
                                                                            border: 1px solid black;
                                                                            border-radius: 5px;
                                                                            padding: 10px;
                                                                            max-width: 300px;
                                                                            margin-left: 10px;"
    >
        <fieldset><legend>Удалить вопрос</legend>
            <input type="text" placeholder="Наименование сессии" name="delName">
            <input type="text" placeholder="Индентификатор вопроса" name="Qid">
            <input type="submit" value="Удалить вопрос" name="button" style="margin-top: 65px;">
        </fieldset>
    </form>
</div>

<?php

if(isset($_POST['button']) && $_POST['button'] == 'Добавить сессию') {
    $link = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');
    $_SESSION['link'] = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');

    if(mysqli_connect_errno()) {
        echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
    }

    $query =                "CREATE TABLE ".$_POST['nazv']."(
                            id INT NOT NULL PRIMARY KEY,
                            Question text NOT NULL,
                            Answer text NOT NULL
                            )";
    $result = mysqli_query($_SESSION['link'], $query) or die("Ошибка " . mysqli_error($link));

    if($result) {
        echo 'Таблица создана успешно!';
    }
}

else if (isset($_POST['button']) && $_POST['button'] == 'Добавить вопрос') {
    $link = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');
    $_SESSION['link'] = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');

        if(mysqli_connect_errno()) {
            echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
        }

        $query =  "INSERT INTO ".$_POST['sessionName']." VALUES( ".$_POST['id'].", '".$_POST['question']."', '".$_POST['answer']."');";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

        if($result) {
            echo 'Данные были успешно введены!';
        }
} 

else if (isset($_POST['button']) && $_POST['button'] == 'Ввести значения') {
    $link = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');
    $_SESSION['link'] = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');

        if(mysqli_connect_errno()) {
            echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
        }

        $query =  "UPDATE ".$_POST['sessionName']." SET Question='".$_POST['question']."', Answer='".$_POST['answer']."' WHERE id =".$_POST['id'].";";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

        if($result) {
            echo 'Данные были успешно введены!';
        }
} 

else if (isset($_POST['button']) && $_POST['button'] == 'Удалить сессию') {
    $_SESSION['link'] = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');
    if(mysqli_connect_errno()) {
        echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
    }

    $delQuery = "DROP TABLE ".$_POST['delName'].";";
    $result = mysqli_query($_SESSION['link'], $delQuery) or die("Ошибка " . mysqli_error($_SESSION['link']));

    if($result) {
        echo 'Сессия была удалена!';
    }
}

else if (isset($_POST['button']) && $_POST['button'] == 'Удалить вариант ответа') {
    $_SESSION['link'] = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');
    if(mysqli_connect_errno()) {
        echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
    }

    $delQuery = "UPDATE ".$_POST['delName']." SET Answer='' WHERE id=".$_POST['Qid'].";";
    $result = mysqli_query($_SESSION['link'], $delQuery) or die("Ошибка " . mysqli_error($_SESSION['link']));

    if($result) {
        echo 'Ответ был удалён!';
    }
}

else if (isset($_POST['button']) && $_POST['button'] == 'Удалить вопрос') {
    $_SESSION['link'] = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');
    if(mysqli_connect_errno()) {
        echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
    }

    $delQuery = "DELETE FROM ".$_POST['delName']." WHERE id=".$_POST['Qid'].";";
    $result = mysqli_query($_SESSION['link'], $delQuery) or die("Ошибка " . mysqli_error($_SESSION['link']));

    if($result) {
        echo 'Ответ был удалён!';
    }
}

?>