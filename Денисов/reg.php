<?php 
    include "components/core.php";
    
    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }

    if(isset($_POST['reg'])){
        foreach($_POST as $key => $value){
            if($key != 'reg'){
                if($value == ''){
                    $errors = "Все поля должны быть заполнены!";
                }
            }
        }
        if(!isset($errors)){
            $password = md5($_POST['password']);
            $link->query("INSERT INTO `users`(`email`, `name`, `last_name`, `password`, `tel`, `address_city`, `address_street`, `address_apart`) 
            VALUES('{$_POST['email']}', '{$_POST['name']}', '{$_POST['last_name']}', '$password', '{$_POST['tel']}', '{$_POST['address_city']}', '{$_POST['address_street']}', '{$_POST['address_apart']}')");
        }
    }  

    include "header.php";
?>
    <main>
        <form action="reg.php" method="post">
            <p>
                <label for="email">Адрес электронной почты</label></br>
                <input type="email" id="email" name="email">
            </p>
            <p>
                <label for="name">Ваше имя</label></br>
                <input type="text" id="name" name="name">
            </p>
            <p>
                <label for="last_name">Ваша фамилия</label></br>
                <input type="text" id="last_name" name="last_name">
            </p>
            <p>
                <label for="password">Введите пароль</label></br>
                <input type="password" id="password" name="password">
            </p>
            <p>
                <label for="tel">Телефон</label></br>
                <input type="text" id="tel" name="tel">
            </p>
            <p>
                <label for="address_city">Город</label></br>
                <input type="text" id="address_city" name="address_city">
            </p>
            <p>
                <label for="address_street">Улица</label></br>
                <input type="text" id="address_street" name="address_street">
            </p>
            <p>
                <label for="address_apart">Дом, квартира</label></br>
                <input type="text" id="address_apart" name="address_apart">
            </p>
            <?php 
                if(isset($errors)){ 
                    echo "<p>$errors</p>";
                }
            ?>
            <button name="reg">
                Зарегистрировать
            </button>
        </form>
    </main>
</body>
</html>
<? include "footer.php"; ?>