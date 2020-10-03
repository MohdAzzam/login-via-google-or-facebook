<?php

class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $phoneNumber;
    private $password;
    private $picture;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getlastName()
    {
        return $this->lastName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPhoneNumber($phone)
    {
        $this->phoneNumber = $phone;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword($password)
    {
        return $this->password;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getPicture()
    {
        return $this->picture;
    }
}