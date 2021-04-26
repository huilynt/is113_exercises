<?php

class User {
    private $username;
    private $passwordHash;
    private $firstname;
    private $lastname;


    function __construct($username, $passwordHash,$firstname,$lastname) {
        $this->username = $username;
        $this->passwordHash = $passwordHash;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPasswordHash(){
        return $this->passwordHash;
    }

    public function setPasswordHash($hashed){
        $this->passwordHash = $hashed;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function getLastname(){
        return $this->lastname;
    }
   
}
