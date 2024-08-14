<?php

if (isset($_POST["Submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];

    require_once 'dbhandler.php';
    require_once 'functions.php';

    if (isValueNotEntered($name, $email, $comment) !== false) {
        header("location:contact.php?error=cause_nothing_entered");
        exit();
    }

    passComments($conn, $name, $email, $comment);
} else {
    header("location:contact.php");
}
