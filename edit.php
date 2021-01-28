<?php
    session_start();


?>
<div class="edit_forms" style="display:flex; flex-direction:row">
    <form action="edit.php/?r=edit" method="post" class="insert_form" style="display: flex;
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

    <form action="edit.php/?r=delete" method="post" class="insert_form" style="display: flex;
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

    <form action="edit.php/?r=answer" method="post" class="insert_form" style="display: flex;
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

    <form action="edit.php/?r=question" method="post" class="insert_form" style="display: flex;
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

if(isset($_POST['button']) && $_POST['button'] == 'Ввести значения') {
    $link = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');
    $_SESSION['link'] = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');

        if(mysqli_connect_errno()) {
            echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
        }

        $query =                "INSERT INTO ".$_POST['sessionName']." VALUES(
                                ".$_POST['id'].",
                                '".$_POST['question']."',
                                '".$_POST['answer']."'
                                )";
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