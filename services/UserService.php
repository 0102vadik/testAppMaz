<?php

namespace services;

use repositories\UserRepository;

require_once "../repositories/UserRepository.php";

class UserService
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function checkUserByLoginPassword($login, $password)
    {
        return $this->userRepository->checkFoundByLoginPassword($login, md5($password));
    }

    public function getAllUserFormatStringArray()
    {
        $userList = $this->userRepository->getAll();
        foreach ($userList as $user) {
            $userStringList[] = $user->toArray();
        }
        return $userStringList;
    }
}