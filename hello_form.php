<?php
require_once('header.php');
?>

    <div class="container">

        <h2>Главная страница</h2>
        <div class="input-group input-group-prepend">
            <form action="scipt_login.php" class="alert alert-warning" method="post">
                <p>
                    <label>Ваш логин:<br></label>
                    <input class="form-control form-control-file" name="login" type="text" size="15" maxlength="15">
                </p>
                <p>
                    <label>Ваш пароль:<br></label>
                    <input class="form-control form-control-file" name="password" type="password" size="15" maxlength="15">
                </p>
                <p>
                    <input class="btn btn-outline-secondary btn-light " type="submit" name="submit" value="Войти">
                    <br>
                    <a href="reg.php">Зарегистрироваться</a>
                </p>
            </form>
        </div>
        <div class="input-group input-group-prepend">
            <br>
            <?php
            if (empty($_SESSION['login']) or empty($_SESSION['id']))
            {
                echo "<div class=\".alert-success\">Вы вошли на сайт, как гость<br>";
            }
            else
            {
                echo "<div>Вы вошли на сайт, как ".$_SESSION['login'];
            }
            ?>
        </div>
    </div>
    </div>
<?php
require_once('footer.php');
?>