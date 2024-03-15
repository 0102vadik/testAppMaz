<?php

namespace controllers;

class LogoutController
{
    public function logout()
    {
        setcookie('login', '', -1, '/');
        header('Location: /pages/loginPage.php');
        die;
    }
}