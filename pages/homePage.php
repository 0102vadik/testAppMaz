<?php

use controllers\LogoutController;
use services\UserService;

require_once('../services/UserService.php');
require_once('../controllers/LogoutController.php');

if (isset($_GET['method'])) {
    $method = $_GET['method'];

    $logoutController = new LogoutController();

    if (method_exists($logoutController, $method)) {
        $logoutController->$method();
    } else {
        echo 'Method not exist';
    }
    die;
}

if (empty($_COOKIE['login'])) {
    header('Location: /pages/loginPage.php');
    die;
}

$userService = new UserService();
$userStringList = $userService->getAllUserFormatStringArray();
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
    <title>Document</title>
</head>
<body>
<div>
    <div class="nav-bar py-2 px-2 " style="background-color: #bbbbbb;">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">MAZ_TEST</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Пустая вкладка (для вида)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Пустая вкладка (для вида)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="homePage.php?method=logout">Выход</a>
            </li>
        </ul>
    </div>
    <div class="table-container container py-5">
        <table class="table table-bordered border-secondary table-striped">
            <thead class="table-secondary">
            <tr>
                <th scope="col">id Пользователей</th>
                <th scope="col">Логин пользователей</th>
                <th scope="col">ФИО Пользователей</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($userStringList as $str) { ?>
                <tr>
                    <th scope="row"><?php echo $str['idUser']; ?></th>
                    <td><?php echo $str['userLogin']; ?></td>
                    <td><?php echo $str['userName']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
