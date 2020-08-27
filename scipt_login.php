<?php
session_start();

function validation_check($str){
    $variable = stripslashes($str);// Un-quotes a quoted string
    $variable = htmlspecialchars($variable);//Convert special characters to HTML entities
    $variable = trim($variable);//Strip whitespace (or other characters) from the beginning and end of a string
    return $variable;
}

if (isset($_POST['login'])) { 
    $login = $_POST['login']; 
    if ($login == '') { unset($login);} 
}

if (isset($_POST['password'])) { 
    $password=$_POST['password']; 
    if ($password =='') { unset($password);} 
}

if (empty($login) or empty($password)){
    require_once('hello_form.php');
    exit ("Вы ввели не всю информацию, заполните все поля!");
    //header('location: /hello_form.php');
}


require_once("db.php");
$result = query_select("SELECT * FROM users WHERE login_user='$login'");
$myrow = $result[0];

if (empty($myrow['login_user']))
{
//если пользователя с введенным логином не существует
    require_once('hello_form.php');
    exit ("Извините, введённый вами login или пароль неверный. 1");
    header("Location: /hello_form.php");
}
else {
    //если существует, то сверяем пароли
    if ($myrow['pass_user']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
        $_SESSION['login']=$myrow['login_user']; 
        $_SESSION['id']=$myrow['id_user'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        $_POST['id'] = $_SESSION['id'];
        echo ">" .$_SESSION['login']."</span>! <br>";
        $_SESSION['hello_form'] = False;
        header("Location: /form.php");
    }
    else {
    //если пароли не сошлись
        //require_once('test_login.php');
        exit ("Извините, введённый вами login или пароль неверный. 2");
        header("Location: /hello_form.php");
    }
}
    ?>
<?php 
//require_once('test_general.php');
?>
