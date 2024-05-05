<!DOCTYPE html>
<html lang="en">
<head>

    <!-- LOGO -->
    <link rel="icon" type="image/x-icon" href="images/RPBS.png">
    <!-- LOGO END -->

    <title>Admin Login | RP Business Solutions LLP. Pune | Digital | IT Solution</title>

    <style>
        
        .logout button {
            position: absolute;
            top: 30px;
            right: 280px;
            background-color: #4CAF50; /* Green background */
           
            padding: 10px 20px; /* Padding */
            border: none; /* No border */
            border-radius: 10px; /* Rounded corners */
            cursor: pointer; /* Cursor style */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }

        .logout button:hover {
            background-color: #45a049; /* Darker green background on hover */
        }

         a {
          text-decoration: none;
          color: white;
          font-size: 20px;
      }

        .center {
            margin: 0 auto; /* This centers the div horizontally */
            width: 60%;
            padding: 5px; 
            text-align: center; 
        }

        table {
            width: 100%; /* Make the table width 100% of its container */
            border-collapse: collapse; /* Collapse table borders */

        }

        th, td {
            border: 2px double ; /* Change border style to double */
            text-align: left; /* Align text to the left */
            padding: 8px; /* Add padding to cells */
        }

        th {
            background-color: #f2f2f2; /* Background color for header cells */
            text-align: center;
        }

    </style>
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
    echo "<div class='center'>";
    echo "<h2>Admin login successful!</h2>";
    echo "</div>";

    // Query to fetch data from the contactForm table
    $contactQuery = "SELECT * FROM contactForm";
    $contactResult = $conn->query($contactQuery);

    if ($contactResult->num_rows > 0) {
        // Display fetched data
        echo "<div class='center'>";
        echo "<h2>Contact Form Entries:</h2>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Message</th>
        </tr>";
        echo "</thead>";
        while ($row = $contactResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['Name']."</td>"; 
            echo "<td>".$row['Surname']."</td>";
            echo "<td>".$row['Email']."</td>";
            echo "<td>".$row['Message']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
       
    } else {
        echo "<div class='center'>";
        echo "No entries found in the contact form.";
        echo "</div>";
    }
} else {
    // If the user does not exist in the database, display error message
    echo "<div class='center'>";
    echo "<h1>Invalid username or password</h1>";
    echo "</div>";
}

$conn->close();
?>

<!-- logout -->
<div class="logout">
    <button><a href="logout.php">Logout</a></button>
</div>


</body>
</html>
