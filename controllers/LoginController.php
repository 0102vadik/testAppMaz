<?php

namespace controllers;
require_once '../models/User.php';
require_once '../services/UserService.php';
require_once 'BaseController.php';

use Exception;
use services\UserService;

class LoginController extends BaseController
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function login($login, $password)
    {
        try {
            if (strlen($password) > 5 && strlen($login) > 5 && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).*$/', $password)) {
                if ($this->userService->checkUserByLoginPassword($login, $password)) {
                    setcookie('login', $login, 0, '/');
                    setcookie('error', '', -1, '/');
                    header('Location: /pages/homePage.php');
                } else {
                    setcookie('error', 'Данного пользователя не существует', 0, '/');
                    header('Location: /pages/loginPage.php');
                }
            } else {
                setcookie('error', 'Введенные данные не соответствуют условиям', 0, '/');
                header('Location: /pages/loginPage.php');
            }
        } catch (Exception $exception) {
            header('Location: /pages/errorPage.php');
        }
    }
}