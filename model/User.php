<?php

require_once '../libraries/Database.php';

class user{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        
    }
}