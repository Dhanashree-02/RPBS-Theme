<html lang="en">
<head>
    <!-- LOGO -->
    <link rel="icon" type="image/x-icon" href="images/RPBS.png">
    <!-- LOGO END -->
    <title>Admin Login | RP Business Solutions LLP. Pune | Digital | IT Solution</title>
</head>
<body>

<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert data into database
$sql = "INSERT INTO ContactForm (Name, Surname, Email, Message) VALUES ('$name', '$surname', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<h1>New record created successfully</h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>

</body>
</html>
