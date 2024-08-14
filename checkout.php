<?php include "header.php"; ?>
 <head>
    <title>Checkout Page</title>
    <style>
        form {
            width: 50%;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="tel">Telephone:</label>
        <input type="tel" id="tel" size="13" name="tel" required>
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
        <label for="upi_id">UPI ID:</label>
        <input type="text" id="upi_id" name="upi_id" required>
        <span id="upi_id_error" style="color:red;"></span>
        <input id="submitBtn" type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
<script>
    document.getElementById("submitBtn").addEventListener("click", function(event) {
        var fullname = document.getElementById("fullname").value;
        var email = document.getElementById("email").value;
        var tel = document.getElementById("tel").value;
        var address = document.getElementById("address").value;
        var upi_id = document.getElementById("upi_id").value;

        

        if (!fullname || !email || !tel || !address || !upi_id) {
            alert("All fields are required!");
            event.preventDefault();
        } else {
            alert("Order Submitted Successfully!");
            localStorage.removeItem("cart");
        }
    });
</script>
<script src="cart.js"></script>
<script>
    const upiIdInput = document.getElementById("upi_id");
    const upiIdError = document.getElementById("upi_id_error");
    upiIdInput.addEventListener("input", function(event) {
        const upiId = event.target.value.trim();
        if (upiId.length === 0) {
            upiIdError.textContent = "UPI ID is required";
            upiIdInput.setCustomValidity("UPI ID is required");
        } else if (!upiId.includes("@")) {
            upiIdError.textContent = "Invalid UPI ID format";
            upiIdInput.setCustomValidity("Invalid UPI ID format");
        } else {
            upiIdError.textContent = "";
            upiIdInput.setCustomValidity("");
        }
    });
</script>
<?php
error_reporting(0);
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $upi_id = $_POST['upi_id'];
    // Connect to the database
    $servername = "bmskart-db-1";
    $username = "root";
    $password = "1234";
    $dbname = "WebDevProject";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Insert the user data into the database
    $sql = "INSERT INTO checkout (fullname, email, tel, address, upi_id)
        VALUES ('$fullname', '$email', '$tel', '$address', '$upi_id')";
    if (mysqli_query($conn, $sql)) {
        echo "   ";
    } else {
        echo '<script>alert("Error inserting data: ' . mysqli_error($conn) . '");</script>';
    }
    // Close the connection
    mysqli_close($conn);
}
?>