<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTVTE Assessment</title>
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
        .dropdown {
            position: relative;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #73caf0;
            min-width: 120px;
            z-index: 1;
            border: 4px solid #2f9fcf; 
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
        .logout {
            margin-left: auto;
        }
        h2 {
            text-align: center;
        }
        form {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        select, input[type="date"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #2f9fcf;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #f4d03f;
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
                <li class="dropdown">
                  <a href="#" class="dropbtn">Assessment <span class="dropdown-icon">&#9660;</span></a>
                  <div class="dropdown-content">
                    <a href="bsit_schedule.php">ACT/BSIT Assessment</a>
                    <a href="bsais_schedule.php">BSAIS Assessment</a>
                    <a href="btvte_schedule.php">BTVTE Assessment</a>
                    <a href="bstm_schedule.php">BSTM Assessment</a>
                    <a href="hm_schedule.php">HM Assessment</a>
                  </div>
                </li>
            </ul>
        </div>
        <div class="logout">
            <a href="login.php">Logout</a> <!-- Moved logout link to the right -->
        </div>
    </nav>
    <h2>BTVTE Schedule</h2>
    <form action="btvte_save_learner.php" method="post"> <!-- Updated action attribute -->
        <label for="learnerID">Learner ID:</label><br>
        <select id="learnerID" name="learnerID" required>
            <?php
            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "register_db";
            $port = 3307;

            $conn = new mysqli($servername, $username, $password, $dbname, $port);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch learner IDs from the database
            $sql = "SELECT learner_id FROM learners";
            $result = $conn->query($sql);

            // Populate the select dropdown with learner IDs
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["learner_id"] . "'>" . $row["learner_id"] . "</option>";
                }
            }

            // Close the database connection
            $conn->close();
            ?>
        </select><br><br>

        <label for="qualification">Qualification:</label><br>
        <select id="qualification" name="qualification" required>
            <option value="FOOD & BEVERAGE SERVICE NC II">FOOD & BEVERAGE SERVICE NC II</option>
            <option value="BARTENDING NC II">BARTENDING NC II</option>
            <option value="BREAD & PASTRY PRODUCTION NC II">BREAD & PASTRY PRODUCTION NC II</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
