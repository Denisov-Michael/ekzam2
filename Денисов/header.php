<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Денисов</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <?php if(!isset($_SESSION['user'])): ?>
            <a href="log.php">Войти</a>
            <a href="reg.php">Регистрация</a>
            <a href="logout.php">Выход</a>
        <?php endif; ?>
        </nav>
    </header>