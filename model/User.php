<?php

require_once '../libraries/Database.php';

class user{
    private $db;

    public function __construct()
    {
        $this->db = new Database;

    }

    //find a user by email or username
    public function findUserByEmail($email, $username){
        $this->db->query('SELECT * FROM users WHERE userUid = :username OR usersEmail = :email');
    }
}