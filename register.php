<?php
require_once "header.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET["error"])) {
    $error = $_GET["error"];

    if ($error == "invalidemail") {
        echo "<script> alert('Invalid email address');</script>";
    }
}
?>
<head>
  <title>Register</title>
</head>
<form action="registeraction.php" method="post">
  <div class="profilepic">
    <img src="img/user.jpg">
  </div>
  <div class="container">
  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "passwordsdontmatch") {
      echo "<script>alert('Passwords dont match');</script>";
    } else if ($_GET["error"] == "userexists") {
      echo "<script>alert('Account already exists');</script>";
    } else if ($_GET["error"] == "none") {
      $error = "none";
      echo "<script>window.location.href = 'login.php?error=" . $error . "';</script>";
      exit(); // Make sure to exit after redirection
    }
  }
  ?>
    <br>
    <label for="username">
      <b>Email id : </b>
    </label>
    <input type="email" name="username" id="username" placeholder="Enter Username">
    <label for="password">
      <b>Enter Password : </b>
    </label>
    <input type="password" name="password" id="password" placeholder="Enter password">
    <label for="password">
      <b>Confirm Password : </b>
    </label>
    <input type="password" name="rpassword" id="rpassword" placeholder="Enter password">
    <button type="submit" name="submit">
      Create Account
    </button>
  </div>
  <style>
    * {
      box-sizing: border-box;
    }

    img {
      width: 400px;
      border-radius: 50%;
    }

    .logo_container img {
      width: 30px;
    }

    form {
      border: 3px solid black;
      margin: 10%;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    .profilepic {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    span.forgotpassword {
      float: right;
    }

    @media screen and (max-width: 300px) {
      span.forgotpassword {
        display: block;
        float: none;
      }
    }

    .container {
      padding: 16px;
    }

    button {
      background-color: blue;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }
  </style>
</form>
<footer>
  <p>Copyright &copy; BMSTechKart.com </p>
</footer>
</body>
</html>