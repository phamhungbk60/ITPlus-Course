<?php
require('./models/User.php');

class UserController 
{
    public function index()
    {
        // Gọi model để lấy dữ liệu từ csdl
        $user = new User();

        //Kiểm tra xem request có phải là XHR (Ajax) hay không, nếu
        //là xhr request thì đổ data vào file view
        if(
            isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strcasecmp($_SERVER['HTTP_X_REQUESTED_WITH'], 'xmlhttprequest') == 0
        ) {
            $users = $user->all();
            //đổ toàn bộ data vào file views/user/data.php
            return require('./views/user/data.php');
        }
    
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
            return json_encode($user);
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
        if (strlen($_POST['id']) === 0) {
            $errors['id'] = 'id is required';
        }

        if (strlen($_POST['first_name']) === 0) {
            $errors['first_name'] = "First name is required";
        }

        if (strlen($_POST['last_name']) === 0) {
            $errors['last_name'] = "Last name is required";
        }

        if (count($errors) === 0) {
            $user = new User();
            $isCreated = $user->create($_POST);
            if ($isCreated) {
                header('location: index.php?controller=user&action=index');
            }
        }
        
        require('./views/user/create.php');
    }

    public function delete()
    {
        $id = $_GET['id'];
        $user = new User();
        $result = $user->delete($id);
        return $result;
    }

}