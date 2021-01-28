<?

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    <style>
                
        main {
            display: flex;
            flex-direction: column;
            /* background-color: #d1cebd; */
            justify-content: center;
            align-items: center;
            max-width: 100%;
            min-height: 100vh;
            font-size: 1.8rem;
        }

        * {
            margin: 0;
            padding: 0;
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

        .admin-form {
            display: flex;
            flex-direction: column;
        }

    </style>
</head>
<body>
    

    <header>
        <img src="img/лого.jpg" alt="" id="logo">
        <ul class="header__menu">
            <li><a href="index.php">Главная</a></li>
            <li><a href="user.php">Форма</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
        
    </header>
    
    <main>
        <?php
            $link = mysqli_connect('std-mysql', 'std_961', 'sungur05', 'std_961');

            if(mysqli_connect_errno()) {
                echo 'Ошибка в подключении ('.mysqli_connect_errno().'): '.mysqli_connect_error().'<br>';
                exit();
            } else {
                echo 'БД подключена!<br>';
            }
        ?>


        <div class="admin-form">
            <?php
                require 'admin.php';

                // require 'ssilka.php';

            ?>
        </div>
        

        <a href="user.php" style="color: black !important;" class="user__button">Перейти к форме</a>

    </main>
        
    <!-- <form method="post" action="/">
        <input type="submit" value="Сгенерировать ссылку">
    </form> -->

    <style>
        .user__button {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #54e346;
            background-color: #65d6ce;
            color: #fff;
            border-radius: 50px;
        }
    </style>
    

</body>
</html>