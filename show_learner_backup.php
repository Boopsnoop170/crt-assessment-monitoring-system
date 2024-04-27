<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Learners</title>
    <link rel="icon" href="crt-logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
        /* Navigation bar styling */
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
            align-items: center;
        }

        nav li {
            margin: 0 10px;
        }

       .dropdown {
        position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #73caf0;
            min-width: 120px;
            z-index: 1;
            border: 4px solid #2f9fcf; /* Thicker border */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #2f9fcf;
        }

        .dropdown-icon {
            margin-left: 5px;
        }
        .button-link {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            text-decoration: none;
        }

        .button-link button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2f9fcf;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .button-link button:hover {
            background-color: #f4d03f;
        }
        nav form {
            display: flex;
            align-items: center;
            margin: 0;
            margin-left: auto;
            margin-right: 15px;
        }

        nav form input[type="search"] {
            border: none;
            background-color: #fff;
            padding: 10px 15px;
            outline: none;
            border-radius: 4px;
            margin-right: 5px;
            height: 38px;
            font-size: 16px;
            width: 400px;
        }

        nav form input[type="submit"] {
            background-color: #2f9fcf;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            outline: none;
            margin: 0;
        }

        nav form input[type="submit"]:hover {
            background-color: #f4d03f;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <!-- Navigation bar code added here -->
    <nav>
        <div class="nav-branding">
            <img src="crt-logo.png" alt="Logo">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="report.php">Report</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-caret-down dropdown-icon"></i></a>
                    <div class="dropdown-content">
                        <a href="bsit_schedule.php">ACT/BSIT Schedule</a>
                        <a href="bsais_schedule.php">BSAIS Schedule</a>
                        <a href="btvte_schedule.php">BTVTE Schedule</a>
                        <a href="bstm_schedule.php">BSTM Schedule</a>
                        <a href="hm_schedule.php">HM Schedule</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="search-bar">
            <form action="#" method="get">
                <input type="search" name="search" placeholder="Search...">
                <input type="submit" value="Search">
            </form>
        </div>
        <div>
            <a href="login.php">Logout</a>
        </div>
    </nav>
    <!-- Navigation bar code added above -->

    <h1 style="text-align: center;">Registered Learners Backup</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Learner ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Courses</th>
                <th>Accomplished NC</th>
                <th>Image</th>
                <th>Restore</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "register_db";
            $port = 3307;

            $conn = new mysqli($servername, $username, $password, $dbname, $port);

            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
            }

            // Fetch the data from the delete_learners table
            $sql = "SELECT * FROM delete_learners";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // Output the data of each row
            while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["id"]. "</td>";
            echo "<td>". $row["learner_id"]. "</td>";
            echo "<td>". $row["lastname"]. "</td>";
            echo "<td>". $row["firstname"]. "</td>";
            echo "<td>". $row["middlename"]. "</td>";
            echo "<td>". $row["courses"]. "</td>";
            echo "<td>". $row["specialization"]. "</td>";
            echo "<td><img src='uploads/". $row["image"]. "' alt='Image' width='100'></td>";
            echo "<td>";
            echo "<form action='show_learner_backup_restore.php' method='post'>";
            echo "<input type='hidden' name='id' value='". $row["id"]. "'>";
            echo "<button type='submit'>Restore</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
            }
            } else {
            echo "<tr><td colspan='6'>No data found.</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>

<br>
<hr>
<a href="admin_show_register_db.php" class="button-link">
    <button>Registered Learner</button>
</a>
<br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
