<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $name = $_POST['name'];
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

  // Insert user data into database
  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$Password')";

  if (mysqli_query($conn, $sql)) {
    header("Location: TriPay/LandingPage/page-login.html");
    
    
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    
  }
  echo "something went wrong";

  mysqli_close($conn);
}
?>
