<?php

namespace controllers;

use Exception;
use services\UserService;

require_once '../services/UserService.php';
require_once 'BaseController.php';

class HomeController extends BaseController
{
    public function index()
    {
        try {
            $userService = new UserService();
            return $userService->getAllUserFormatStringArray();
        } catch (Exception $exception) {
            header('Location: /pages/errorPage.php');
            return 0;
        }
    }
}