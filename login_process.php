<html lang="en">
<head>
    <!-- LOGO -->
    <link rel="icon" type="image/x-icon" href="images/RPBS.png">
    <!-- LOGO END -->
    <title>Admin Login | RP Business Solutions LLP. Pune | Digital | IT Solution</title>

    <style>
        body {
            background-image: url('images/adminbg.jpg');
            background-size: cover; 
            background-repeat: no-repeat;             
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
        echo "<h2>Admin login successful!</h2><br>";

        // Query to fetch data from the contactForm table
        $contactQuery = "SELECT * FROM contactForm";
        $contactResult = $conn->query($contactQuery);

        if ($contactResult->num_rows > 0) {
            // Display fetched data
            echo "<div>";
            echo "<h2>Contact Form Entries:</h2>";
            echo "<table border='2' style='margin:12; padding: 5;'>";
            echo "<thead style='background-color: #f2f2f2;'>";
            echo "<tr>
            <th style='padding: 10px;'>Name</th> <!-- Add padding to th -->
            <th>Surname</th>
            <th>Email</th>
            <th>Message</th>
            </tr>";
            echo "</thead>";
            while ($row = $contactResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='padding: 10px;'>".$row['Name']."</td>"; 
                echo "<td style='padding: 10px;'>".$row['Surname']."</td>";
                echo "<td style='padding: 10px;'>".$row['Email']."</td>";
                echo "<td style='padding: 10px;'>".$row['Message']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            echo "No entries found in the contact form.";
        }
    } else {
        // If the user does not exist in the database, display error message
        echo "<h1>Invalid username or password</h1>";
    }

    $conn->close();
    ?>


</body>
</html>