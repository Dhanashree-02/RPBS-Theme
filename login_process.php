<!DOCTYPE html>
<html lang="en">
<head>
    <!-- to log out after 1 min -->
    <meta http-equiv="refresh" content="60; url=admin.php">

    <!-- LOGO -->
    <link rel="icon" type="image/x-icon" href="images/RPBS.png">
    <!-- LOGO END -->

    <title>Admin Login | RP Business Solutions LLP. Pune | Digital | IT Solution</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login_process.css">
</head>
<body>
    <header class="header-area header-sticky shadow p-2 mb-2" data-wow-duration="0.75s" data-wow-delay="0s" style="z-index: 999;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="images/RPBS.png" style="height:50px; width: 60px; margin-top: 10px;" >  Back to Home 
                        </a>
                        <!-- Logout button -->
                        <div class="logout">
                            <a href="logout.php">Logout</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

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
            echo "<table class='table'>";
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
</body>
</html>
