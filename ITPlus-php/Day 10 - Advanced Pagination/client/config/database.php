<?php

define("DB_HOST", "localhost");

define("DB_USERNAME", "root");

define("DB_PASSWORD", "root");

define("DB_DATABASE", "sms");

$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Cannot connect to mysql");
}
//cases: 1st - success
//cases2: fail
