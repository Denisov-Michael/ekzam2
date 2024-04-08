<?php 

    include "components/core.php";

    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }
    
    if(isset($_POST['log'])){
        $password = md5($_POST['password']);
        $users = $link->query("SELECT * FROM `users` 
            WHERE `email` = '{$_POST['email']}' AND `password` = '$password'");
        if($users->num_rows > 0){
            $user = $users->fetch_assoc();
            $_SESSION['user'] = [
                'id' => $user['id'],
                'isAdmin' => $user['isAdmin'],
            ];
            header("Location: index.php");
        }else{
            $errors = "Неверный логин или пароль";
        }
    }

    include "header.php";
?>
    <main>
        <form action="log.php" method="post">
            <p>
                <label for="email">Ваш логин(email)</label><br/>
                <input type="email" id="email" name="email">
            </p>
            <p>
                <label for="password">Пароль</label><br/>
                <input type="password" id="password" name="password">
            </p>
            <?php 
                if(isset($errors)){ 
                    echo "<p>$errors</p>";
                }
            ?>
            <button name="log">
                Войти
            </button>
        </form>
    </main>
</body>
</html>
<? include "footer.php"; ?>