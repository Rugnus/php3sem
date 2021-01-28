<?
    session_start();


?>
<form method="post" action="add.php/?add">
    
    <label for="nazv">Название для экспертной сессии</label><input name="nazv" type="text" placeholder="Название сесии">
    <input type="submit" name="button" value="Добавить сессию">

</form>

<?
    if(isset($_POST['button']) && $_POST['button'] == 'Добавить сессию') {
        $link = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');

        if(mysqli_connect_errno()) {
            echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
        }

        $query =                "CREATE TABLE ".$_POST['nazv']."(
                                id INT NOT NULL PRIMARY KEY,
                                Question text NOT NULL,
                                Answer text NOT NULL
                                )";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

        if($result) {
            echo 'Таблица создана успешно!';
        }
    }
    $tableName = $_POST['nazv'];
    $_SESSION['tableName'] = $_POST['nazv'];

    $sql = "CREATE TABLE ".$tableName.';';

    

?>