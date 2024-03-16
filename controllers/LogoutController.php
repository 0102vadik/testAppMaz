<?php

namespace controllers;

require_once 'BaseController.php';
class LogoutController extends BaseController
{
    public function logout()
    {
        setcookie('login', '', -1, '/');
        header('Location: /pages/loginPage.php');
        die;
    }
}