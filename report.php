<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <link rel="icon" href="crt-logo.png">
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

        .logout {
            margin-left: auto; /* Push the logout button to the right */
        }

        @media only screen and (max-width: 600px) {
            .form-box {
                width: 90%;
            }
        }

        /* Table styling */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
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

        /* Adjust table columns */
        .table-bsit th,
        .table-bsit td {
            width: 25%;
        }

        .table-bsais th,
        .table-bsais td {
            width: 25%;
        }

        .table-btvte th,
        .table-btvte td {
            width: 25%;
        }

        .table-bstm th,
        .table-bstm td {
            width: 25%;
        }

        .table-hm th,
        .table-hm td {
            width: 25%;
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

    <h2>ACT/BSIT Assessment</h2>
    <table class="table-bsit">
        <tr>
            <th>Learner ID</th>
            <th>Qualification</th>
            <th>Status</th>
            <th>Assessment Date</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "register_db";
        $port = 3307;

        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT learnerID, qualification, status, assessmentDate FROM act_bsit";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["learnerID"] . "</td>";
                echo "<td>" . $row["qualification"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>" . $row["assessmentDate"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <br>

    <h2>BSAIS Assessment</h2>
    <table class="table-bsais">
        <tr>
            <th>Learner ID</th>
            <th>Qualification</th>
            <th>Status</th>
            <th>Assessment Date</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "register_db";
        $port = 3307;

        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT learnerID, qualification, status, assessmentDate FROM bsais";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["learnerID"] . "</td>";
                echo "<td>" . $row["qualification"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>" . $row["assessmentDate"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <br>

    <h2>BTVTE Assessment</h2>
    <table class="table-btvte">
        <tr>
            <th>Learner ID</th>
            <th>Qualification</th>
            <th>Status</th>
            <th>Assessment Date</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "register_db";
        $port = 3307;

        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT learnerID, qualification, status, assessmentDate FROM btvte";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["learnerID"] . "</td>";
                echo "<td>" . $row["qualification"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>" . $row["assessmentDate"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <br>

    <h2>BSTM Assessment</h2>
    <table class="table-bstm">
        <tr>
            <th>Learner ID</th>
            <th>Qualification</th>
            <th>Status</th>
            <th>Assessment Date</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "register_db";
        $port = 3307;

        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT learnerID, qualification, status, assessmentDate FROM bstm";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["learnerID"] . "</td>";
                echo "<td>" . $row["qualification"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>" . $row["assessmentDate"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <br>

    <h2>HM Assessment</h2>
    <table class="table-hm">
        <tr>
            <th>Learner ID</th>
            <th>Qualification</th>
            <th>Status</th>
            <th>Assessment Date</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "register_db";
        $port = 3307;

        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT learnerID, qualification, status, assessmentDate FROM hm";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["learnerID"] . "</td>";
                echo "<td>" . $row["qualification"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>" . $row["assessmentDate"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <br>


</body>
</html>
