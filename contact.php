<?php
require_once "header.php";
if (isset($_GET['error']) && $_GET['error'] == 'invalidemail') {
  echo "<script> alert('Invalid email entered'); </script>";
} elseif (isset($_GET['success']) && $_GET['success'] == 'messageSent') {
  echo "<script> alert('Your message has been sent successfully'); </script>";
}
?>

<head>
  <title>Contact Us</title>
</head>

<form action="contactaction.php" method="post">
  <input name="name" type="text" class="feedback-input" placeholder="Name" required />
  <input name="email" type="email" class="feedback-input" placeholder="Email" required />
  <textarea name="comment" class="feedback-input" placeholder="Comment" required></textarea>
  <input type="Submit" name="Submit" id="Submit" value="SUBMIT" />
</form>

<footer>
  <p>Copyright &copy; BMSTechKart.com </p>
</footer>
</main>

<style>
  @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

  form {
    max-width: 420px;
    margin: auto;
    padding-top: 20px;
  }

  .btn {
    padding: 5px 10px;
    color: black;
    background: var(--main-bg-color);
    border: 2px solid white;
    border-radius: 7px;
    cursor: pointer;
    box-shadow: 0 0px 5px rgb(255, 255, 255);
  }

  #Submit {
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;
    width: 100%;
    background: #CC6666;
    height: 35px;
    border-radius: 5px;
    border: 0;
    cursor: pointer;
  }

  .feedback-input {
    color: rebeccapurple;
    font-family: Helvetica, Arial, sans-serif;
    font-weight: 500;
    font-size: 18px;
    border-radius: 5px;
    line-height: 22px;
    background-color: transparent;
    border: 2px solid #CC6666;
    transition: all 0.3s;
    padding: 13px;
    margin-bottom: 15px;
    width: 100%;
    box-sizing: border-box;
    outline: 0;
  }

  .feedback-input:focus {
    border: 2px solid #CC4949;
  }

  textarea {
    height: 150px;
    line-height: 150%;
    resize: vertical;
  }

  .dalo {
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;
    width: 100%;
    background: #CC6666;
    border-radius: 5px;
    border: 0;
    cursor: pointer;
  }

  form.dalo:hover {
    background-color: #CC4949;
  }

  footer {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    width: 100%;
    bottom: 0;
    background-color: rgb(180, 181, 215);
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    height: 5vh;
  }
</style>
</body>

</html>