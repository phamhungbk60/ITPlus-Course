<?php
require('./models/User.php');

class UserController 
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        // Gọi model để lấy dữ liệu từ csdl
        $user = new User();
        // lấy tất cả records trong CSDL
        $users = $user->all();
        // fetch data vào views trong user/index.php
        require('./views/user/index.php');
    }

    public function view()
    {
        if (isset($_GET['id'])) {
            // Gọi model để lấy dữ liệu từ csdl
            $user = new User();
            // lấy tất cả records trong CSDL
            $user = $user->first($_GET['id']);
            // fetch data vào views trong user/index.php
            require('./views/user/view.php');
        }
    }

    public function create()
    {
        $errors = [];
        require('./views/user/create.php');
    }

    public function store()
    {
        $errors = [];

        if (strlen($_POST['first_name']) === 0) {
            $errors['first_name'] = "First name is required";
        }

        if (strlen($_POST['last_name']) === 0) {
            $errors['last_name'] = "Last name is required";
        }

        if (count($errors) === 0) {
            $isCreated = $this->user->create($_POST);
            if ($isCreated) {
                header('location: index.php?controller=user&action=index');
            }
        }
        
        require('./views/user/create.php');
    }

    public function edit() 
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $user = $this->user->first($id);
            require('./views/user/edit.php');
        }
    }

    public function update()
    {
        $errors = [];
        $id = $_GET['id'];

        if (isset($_POST['first_name']) && strlen($_POST['first_name']) === 0) {
            $errors['first_name'] = "First name is required";
        }

        if (isset($_POST['last_name']) && strlen($_POST['last_name']) === 0) {
            $errors['last_name'] = "Last name is required";
        }

        if (count($errors) === 0) {
            $isCreated = $this->user->update($_POST, $id);
            if ($isCreated) {
                header('location: index.php?controller=user&action=index');
            }
        }
        
        require('./views/user/create.php');
    }

    public function delete()
    {
        $id = $_GET['id'];
        $result = $this->user->delete($id);
        if ($result) {
            header('location: index.php?controller=user&action=index');
        }
    }
}