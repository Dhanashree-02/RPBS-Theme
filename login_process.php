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
$username = $_POST['username'];
$password = $_POST['password'];

// Sanitize input to prevent SQL injection (optional but recommended)
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// SQL query to check if the username and password exist in the database
$sql = "SELECT * FROM admin WHERE admin_name='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If the user exists in the database, display success message
    echo "Admin login successful!<br>";

    // Query to fetch data from the contactForm table
    $contactQuery = "SELECT * FROM contactForm";
    $contactResult = $conn->query($contactQuery);

    if ($contactResult->num_rows > 0) {
        // Display fetched data
        echo "<h2>Contact Form Entries:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Surname</th><th>Email</th><th>Message</th></tr>";
        while ($row = $contactResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['Name']."</td>";
            echo "<td>".$row['Surname']."</td>";
            echo "<td>".$row['Email']."</td>";
            echo "<td>".$row['Message']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No entries found in the contact form.";
    }
} else {
    // If the user does not exist in the database, display error message
    echo "Invalid username or password";
}

$conn->close();
?>
