<?php

namespace models;

use JsonSerializable;

class User implements JsonSerializable
{
    protected $idUser;
    protected $userLogin;
    protected $userName;
    protected $userPassword;

    public function __construct($idUser, $userLogin, $userName, $userPassword)
    {
        $this->idUser = $idUser;
        $this->userLogin = $userLogin;
        $this->userName = $userName;
        $this->userPassword = $userPassword;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getUserLogin()
    {
        return $this->userLogin;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function jsonSerialize()
    {
        return [
            'idUser' => $this->idUser,
            'userLogin' => $this->userLogin,
            'userName' => $this->userName,
            'userPassword' => $this->userPassword,
        ];
    }

    public function toArray()
    {
        return [
            'idUser' => $this->idUser,
            'userLogin' => $this->userLogin,
            'userName' => $this->userName,
            'userPassword' => $this->userPassword,
        ];
    }
}