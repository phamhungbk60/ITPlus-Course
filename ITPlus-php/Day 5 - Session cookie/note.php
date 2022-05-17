<?php

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'camnh' && $password == '123') {
        $_SESSION['username'] = $username;
    }
}

?>

<form method="POST">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="text" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <button type="submit" name="login">Login</button>
</form>