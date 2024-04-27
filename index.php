<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="icon" href="crt-logo.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        nav {
            background-color: #2f9fcf;
            padding: 15px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .nav-branding {
            display: flex;
            align-items: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #f4d03f;
        }
        nav img {
            height: 50px;
            margin-right: 10px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav li {
            margin: 0 10px;
        }
        .logout {
            margin-left: auto;
        }
        .profile-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .profile-image {
            width: 150px;
            height: 150px;
            border: 1px solid #ddd;
            overflow: hidden;
            margin: 80px auto;
            flex-shrink: 0;
            border-radius: 50%;
        }
        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-info,
        .profile-links {
            flex: 1;
            padding: 20px;
        }
        .profile-info p {
            margin-bottom: 10px;
        }
        .profile-info strong {
            font-weight: bold;
            color: #333;
        }
        .profile-links {
            text-align: center;
        }
        .profile-links table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        .profile-links th, .profile-links td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .profile-links th {
            background-color: #2f9fcf;
            color: white;
        }
        .profile-links a {
            color: #2f9fcf;
            text-decoration: none;
        }
        .profile-links a:hover {
            text-decoration: underline;
        }
        .form-line {
            border-bottom: 5px solid #ccc;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-branding">
            <img src="crt-logo.png" alt="Logo">
            <ul>
                <li><a href="index.php">User Profile</a></li>
                <li><a href="report.php">Schedule</a></li>
            </ul>
        </div>
        <div class="logout">
            <a href="login.php">Logout</a> <!-- Moved logout link to the right -->
        </div>
    </nav>
    <div class="profile-details">
        <div class="profile-image">
            <!-- Display user's image -->
            <?php
                // Retrieve user's image from the database and display it
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "register_db";
                $port = 3307;

                $conn = new mysqli($servername, $username, $password, $dbname, $port);
                if ($conn->connect_error) {
                    die("Connection failed: ". $conn->connect_error);
                }

                // Start session to retrieve user's session data
                session_start();

                // Retrieve user's learner_id from the session
                $learner_id = $_SESSION['learner_id'];

                // Retrieve user's information from the database using the learner ID
                $sql = "SELECT * FROM learners WHERE learner_id = '$learner_id'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<img src="uploads/'. $row['image']. '" alt="User Image">';
                }
                $conn->close();
            ?>
        </div>
        <div class="profile-info">
        <!-- Display user's information-->
            <?php
                // Display user's information
                echo "<p><strong>Learner ID:</strong> ". $row['learner_id']. "</p>";
                echo "<p><strong>Last Name:</strong> ". $row['lastname']. "</p>";
                echo "<p><strong>First Name:</strong> ". $row['firstname']. "</p>";
                echo "<p><strong>Middle Name:</strong> ". $row['middlename']. "</p>";
                echo "<p><strong>Courses:</strong> ". $row['courses']. "</p>";
                echo "<p><strong>Accomplished NC:</strong></p>";
                $accomplished_nc = explode(',', $row['specialization']);
                foreach ($accomplished_nc as $nc) {
                    echo "<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;- $nc</strong></p>";
                }
                echo "<p><strong>Account Status:</strong> ". $row['status']. "</p>";
            ?>
        </div>
        <div class="profile-links">
            <h2>Available Courses for NC</h2>
            <table>
                <tr>
                    <th>Courses</th>
                </tr>
                <tr>
                    <td><a href="bsit_schedule.php">ACT/BSIT</a></td>
                </tr>
                <tr>
                    <td><a href="bsais_schedule.php">BSAIS</a></td>
                </tr>
                <tr>
                    <td><a href="btvte_schedule.php">BTVTE</a></td>
                </tr>
                <tr>
                    <td><a href="bstm_schedule.php">BSTM</a></td>
                </tr>
                <tr>
                    <td><a href="hm_schedule.php">HM</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form-line"></div>
</body>
</html>
