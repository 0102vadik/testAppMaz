<?php

namespace repositories;

use Exception;
use models\User;

require_once "../constants/StorageRoute.php";
require_once '../models/User.php';

class UserRepository
{
    protected $userList;

    public function __construct()
    {
        $ourData = file_get_contents(USER_STORAGE_ROUTE);
        $object = json_decode($ourData);
        foreach ($object as $user) {
            $this->userList[] = new User($user->idUser, $user->userLogin, $user->userName, $user->userPassword);
        }
    }

    public function getAll()
    {
        return $this->userList;
    }

    /**
     * @throws Exception
     */
    public function getByLoginPassword($login, $password)
    {
        foreach ($this->userList as $user) {
            if ($user->getUserLogin() == $login && $user->getUserPassword() == $password) {
                return $user;
            }
        }
        throw new Exception("User not found");
    }

    public function checkFoundByLoginPassword($login, $password)
    {
        foreach ($this->userList as $user) {
            if ($user->getUserLogin() == $login && $user->getUserPassword() == $password) {
                return true;
            }
        }
        return false;
    }
}