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

// Fetch data from database 
$sql = "SELECT * FROM ContactForm";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start table
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Surname</th><th>Email</th><th>Message</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Name"]. "</td>";
        echo "<td>" . $row["Surname"]. "</td>";
        echo "<td>" . $row["Email"]. "</td>";
        echo "<td>" . $row["Message"]. "</td>";
        echo "</tr>";
    }

    // End table
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
