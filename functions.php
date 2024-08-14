<?php

function pwdMatch($pwd, $pwdRepeat)
{
    $result = true;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username)
{
    $sql = "select * from users where email_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:register.php?error=userexists");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $pwd)
{
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        header("location:register.php?error=invalidemail");
        exit();
    }

    $sql = "insert into users(email_id,pwd) values(?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:register.php?error=userexists");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:register.php?error=none");
    exit();
}

function isValueNotEntered($name, $email, $comment)
{
    if ($name == "" || $email == "" || $comment == "") {
        return true;
    } else {
        return false;
    }
}

function passComments($conn, $name, $email, $comments)
{
    $error = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "invalidemail";
    } else {
        $sql = "insert into audience(audiencename,email_id,comments) values(?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $error = "invalid";
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $comments);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            $success = "messageSent";
        }
    }
    if ($error) {
        header("location:contact.php?error=" . $error);
    } else {
        header("location:contact.php?success=" . $success);
    }
    exit();
}

function emptyInputLogin($username, $pwd)
{
    $result = true;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $result = true;
            $error = "Invalid email address";
            header("location:login.php?" . http_build_query(['error' => $error]));
            exit();
        }
        $result = false;
    }
    return $result;
}


function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username);

    if ($uidExists == false) {
        header("location:login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd == false) {
        header("location:login.php?error=wrongloginpwd");
        exit();
    } else if ($checkPwd == true) {
        session_start();
        $_SESSION["email_id"] = $uidExists["email_id"];
        header("location:index.php?error=none");
        exit();
    }
}

function storeProducts($conn, $title, $price, $email)
{
    $sql = "insert into orders(email_id, product_title, product_price) values(?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:contact.php?error=erroratcontactpage");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $title, $price, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:contact.php?error=none");
    exit();
}
