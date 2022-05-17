<?php

session_start();

if (isset($_SESSION['a_value'])) {
    echo $_SESSION['a_value'];
}
