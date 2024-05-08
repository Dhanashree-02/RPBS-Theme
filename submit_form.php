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

// Get current date and time
$currentDateTime = date('Y-m-d H:i:s');

// Insert data into database
$sql = "INSERT INTO ContactForm (Name, Surname, Email, Message, SubmitDateTime) VALUES ('$name', '$surname', '$email', '$message', '$currentDateTime')";

if ($conn->query($sql) === TRUE) {
    echo "<h1>New record created successfully</h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
