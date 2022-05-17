<?php

require('models/User.php');
class UserController 
{
    //index.php?controller=user&action=index
    public function index()
    {
        $user = new User();
        $users = $user->all();
        require('views/user/index.php');
    }

    //index.php?controller=user&action=create
    public function create()
    {
        require('views/user/create.php');
    }

    public function store()
    {
        if (isset($_POST['submit'])) {
            $user = new User();
            $isCreated = $user->create($_POST);
            if ($isCreated) {
                header('location:index.php?controller=user&action=index');
            }
        }
    }
}