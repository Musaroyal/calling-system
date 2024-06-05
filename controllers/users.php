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
            'usersEmail' => trim($_POST['usersEmail']),
            'usersUid' => trim($_POST['usersUid']),
            'usersPwd' => trim($_POST['usersPwd']),
            'pwdRepeat' => trim($_POST['pwdRepeat'])
        ];

        if(empty($data.['usersName']) || empty($data['usersEmail']) || empty($data['usersUid']) || empty($data['usersPwd']) || empty($data['pwdRepeat'])){
            flash("register", "Please fill out all inputs");
            redirect("../signup.php");
        }

        if(!preg_match("/^[a-zA-Z0-9]*$/", $data["usersUid"])){
            flash("register", "Invalid username");
            redirect("../signup.php");
        }

        if(!filter_var($data["userEmail"], FILTER_VALIDATE_EMAIL)){
            flash("register", "Invalid email");
            redirect("../signup.php");
        }

        if(strlen($data["userPwd"]) < 6){
            flash("register", "Invalid password");
            redirect("../signup.php");
        }else if($data['usersPwd'] !==$data['pwdRepeat']){
            flash("register", "Invalid password");
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