<?php

use controllers\LoginController;

require_once('../controllers/LoginController.php');

if (!empty($_COOKIE['login'])) {
    header('Location: /pages/homePage.php');
    die;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['login']) && !empty($_POST['password'])) {
    set_error_handler("customErrorHandler");
    $loginController = new LoginController();
    $loginController->login($_POST['login'], $_POST['password']);
    die;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>MazApp</title>
</head>
<body>
<br/>
<div class="container">
    <?php if (!empty($_COOKIE['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <strong>Ошибка!</strong> <?php echo $_COOKIE['error'] ?>
        </div>
    <?php } ?>
    <form class="form-outline mb-4 my-5" action="loginPage.php" method="POST">
        <!--Login input-->
        <div class="form-outline mb-4">
            <label class="form-label" for="formLoginInput">Логин</label>
            <input type="text" id="formLoginInput" class="form-control" name="login">
        </div>

        <!--Password input-->
        <div class="form-outline mb-4">
            <label class="form-label" for="formPasswordInput">Пароль</label>
            <input type="password" id="formPasswordInput" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Войти</button>
    </form>
</div>
</body>
</html>
