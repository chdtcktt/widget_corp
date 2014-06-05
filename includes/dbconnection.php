<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "widget_corp";

$con = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    die("Database connection failed: " .
            mysqli_connect_error() . " " .
            mysqli_connect_errno()
    );
}
    
    