<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["rpassword"];

    require_once 'dbhandler.php';
    require_once 'functions.php';

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: register.php?error=passwordsdontmatch!");
        exit();
    }

    if (uidExists($conn, $username) !== false) {
        header("location: login.php?error=userexists");
        exit();
    }

    createUser($conn, $username, $pwd);
} else {
    header("location: register.php");
}
