<?php

require_once '../model/User.php';
require_once '../helpers/session_header.php';
class Users{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
    }
    public function register(){


        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'usersName' => trim($_POST['usersName']),
            'usersEmail' => trim($POST['usersEmail']),
            'usersUid' => trim($POST['usersUid']),
            'usersPwd' => trim($POST['usersPwd']),
            'pwdRepeat' => trim($POST['pwdRepeat'])
        ];

        if(empty($data.['usersName']) || empty($data['usersEmail']) || empty($data['usersUid']) || empty($data['usersPwd']) || empty($data['pwdRepeat'])){
            flash("register", "Please fill out all inputs");
            redirect("../signup.php");
        }
    }
}

$init = new Users;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['type']){
        case 'register':
            $init->register();
            break;

    }
}