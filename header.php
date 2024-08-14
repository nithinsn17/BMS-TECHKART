<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/section.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="icon" href="img/logo.jpg" style="border-radius: 5;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css">
</head>
<body>
    <main>
        <header>
            <a href="#" class="logo_container">
                <img src="img/logo.jpg">
            </a>
            <ul class="navigation">
                <li><a href="index.php">HOME</a></li>
                <!-- <li><a href="about.php">ABOUT</a></li> -->
                <li><a href="contact.php">CONTACT</a></li>
                <?php
                if (isset($_SESSION["email_id"])) {
                    echo "<li><a href='logout.php'>LOGOUT</a></li>";
                } else {
                    echo "<li><a href='login.php'>LOGIN</a></li>";
                }
                if (isset($_SESSION["email_id"])) {
                    echo "<li><a href='cart.php'><i class='fa-sharp fa-solid fa-cart-shopping' id='cart_icon'></i></a></li>";
                }
                ?>
            </ul>
        </header>
