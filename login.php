<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['email'];
    $Password = $_POST['password'];

    // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "myDB";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute SELECT query
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$Password'";
    $result = mysqli_query($conn, $sql);

    // Check if user exists in database
    if (mysqli_num_rows($result) == 1) {
        // Redirect to a particular URL
        header("Location: TriPay/index.html");
        exit();
    } else {
        // User does not exist, show error message
        header("Location: TriPay/LandingPage/page-login.html");
    }

    mysqli_close($conn);
}
?>
