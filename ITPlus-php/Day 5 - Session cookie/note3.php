<?php

session_start();

echo "Note3" . $_SESSION['username'];

if (isset($_POST['logout'])) {
    unset($_SESSION['username']);
    header('location:note.php');
}

?>

<form method="POST">
    <button type="submit" name="logout">Logout</button>
</form>