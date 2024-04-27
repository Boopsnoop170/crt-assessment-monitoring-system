<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Approval Page</title>
    <link rel="icon" href="crt-logo.png">
    <style>
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

        form {
            display: inline-block;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        nav {
            background-color: #6aa84f; 
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
            background-color: #6aa84f;
            min-width: 120px;
            z-index: 1;
            border: 4px solid #3d632d; 
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
            background-color: #3d632d;
        }

        .dropdown-icon {
            margin-left: 5px;
        }  
        .logout {
            margin-left: auto; 
        }
        .btn-approve, .btn-reject {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-approve:hover {
            background-color: #4d4d4d; 
        }

        .btn-reject:hover {
            background-color: #8b0000;
        }
        .btn-approve {
            background-color: #5cb85c;
            color: white;
        }
        .btn-reject {
            background-color: #d9534f;
            color: white;
        }
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
        @media only screen and (max-width: 600px) {
            .form-box {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<nav>
  <div class="nav-branding">
    <img src="crt-logo.png" alt="Logo">
    <ul>
      <li><a href="admin_report.php">Report</a></li>
      <li class="dropdown">
        <a href="#" class="dropbtn">Process <span class="dropdown-icon">&#9660;</span></a>
        <div class="dropdown-content">
          <a href="admin_process.php">Process Registered</a>
          <a href="admin_schedule_process.php">Process Schedule</a>
        </div>
      </li>
      <li class="dropdown">
        <a href="#" class="dropbtn">Register <span class="dropdown-icon">&#9660;</span></a>
        <div class="dropdown-content">
          <a href="admin_show_register_db.php">Registered students</a>
          <a href="admin_admin_register.php">Register an Admin</a>
        </div>
      </li>
    </ul>
  </div>
  <div class="logout">
    <a href="login.php">Logout</a>
  </div>
</nav>

    <h2>ACT/BSIT Schedule Approval</h2>
<table class="table-bsit">
    <tr>
        <th>Learner ID</th>
        <th>Qualification</th>
        <th>Status</th>
        <th>Assessment Date</th>
        <th>Action</th>
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
            echo "<td>";
            echo "<form action='admin_bsit_schedule_process_db.php' method='post'>";
            echo "<input type='hidden' name='learnerID' value='" . $row["learnerID"] . "'>";
            echo "<input type='hidden' name='qualification' value='" . $row["qualification"] . "'>";
            echo "<input type='hidden' name='status' value='" . $row["status"] . "'>";
            echo "<input type='date' name='assessmentDate' value='" . ($row["assessmentDate"] ? $row["assessmentDate"] : "") . "'>";
            echo "</td>";
            echo "<td>";
            echo "<button type='submit' class='btn-approve' name='action' value='approve'>Approve</button>";
            echo "<button type='submit' class='btn-reject' name='action' value='reject'>Reject</button>";
            echo "</td>";
            echo "</form>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found.</td></tr>";
    }
    $conn->close();
    ?>
</table>

<h2>BSAIS Schedule Approval</h2>
<table class="table-bsais">
    <tr>
        <th>Learner ID</th>
        <th>Qualification</th>
        <th>Status</th>
        <th>Assessment Date</th>
        <th>Action</th>
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
            echo "<td>";
            echo "<form action='admin_bsais_schedule_process_db.php' method='post'>";
            echo "<input type='hidden' name='learnerID' value='" . $row["learnerID"] . "'>";
            echo "<input type='hidden' name='qualification' value='" . $row["qualification"] . "'>";
            echo "<input type='hidden' name='status' value='" . $row["status"] . "'>";
            echo "<input type='date' name='assessmentDate' value='" . ($row["assessmentDate"] ? $row["assessmentDate"] : "") . "'>";
            echo "</td>";
            echo "<td>";
            echo "<button type='submit' class='btn-approve' name='action' value='approve'>Approve</button>";
            echo "<button type='submit' class='btn-reject' name='action' value='reject'>Reject</button>";
            echo "</td>";
            echo "</form>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found.</td></tr>";
    }
    $conn->close();
    ?>
</table>

<h2>BTVTE Schedule Approval</h2>
<table class="table-btvte">
    <tr>
        <th>Learner ID</th>
        <th>Qualification</th>
        <th>Status</th>
        <th>Assessment Date</th>
        <th>Action</th>
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
            echo "<td>";
            echo "<form action='admin_btvte_schedule_process_db.php' method='post'>";
            echo "<input type='hidden' name='learnerID' value='" . $row["learnerID"] . "'>";
            echo "<input type='hidden' name='qualification' value='" . $row["qualification"] . "'>";
            echo "<input type='hidden' name='status' value='" . $row["status"] . "'>";
            echo "<input type='date' name='assessmentDate' value='" . ($row["assessmentDate"] ? $row["assessmentDate"] : "") . "'>";
            echo "</td>";
            echo "<td>";
            echo "<button type='submit' class='btn-approve' name='action' value='approve'>Approve</button>";
            echo "<button type='submit' class='btn-reject' name='action' value='reject'>Reject</button>";
            echo "</td>";
            echo "</form>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found.</td></tr>";
    }
    $conn->close();
    ?>
</table>

<h2>BSTM Schedule Approval</h2>
<table class="table-bstm">
    <tr>
        <th>Learner ID</th>
        <th>Qualification</th>
        <th>Status</th>
        <th>Assessment Date</th>
        <th>Action</th>
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
            echo "<td>";
            echo "<form action='admin_bstm_schedule_process_db.php' method='post'>";
            echo "<input type='hidden' name='learnerID' value='" . $row["learnerID"] . "'>";
            echo "<input type='hidden' name='qualification' value='" . $row["qualification"] . "'>";
            echo "<input type='hidden' name='status' value='" . $row["status"] . "'>";
            echo "<input type='date' name='assessmentDate' value='" . ($row["assessmentDate"] ? $row["assessmentDate"] : "") . "'>";
            echo "</td>";
            echo "<td>";
            echo "<button type='submit' class='btn-approve' name='action' value='approve'>Approve</button>";
            echo "<button type='submit' class='btn-reject' name='action' value='reject'>Reject</button>";
            echo "</td>";
            echo "</form>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found.</td></tr>";
    }
    $conn->close();
    ?>
</table>

<h2>HM Schedule Approval</h2>
<table class="table-hm">
    <tr>
        <th>Learner ID</th>
        <th>Qualification</th>
        <th>Status</th>
        <th>Assessment Date</th>
        <th>Action</th>
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
            echo "<td>";
            echo "<form action='admin_hm_schedule_process_db.php' method='post'>";
            echo "<input type='hidden' name='learnerID' value='" . $row["learnerID"] . "'>";
            echo "<input type='hidden' name='qualification' value='" . $row["qualification"] . "'>";
            echo "<input type='hidden' name='status' value='" . $row["status"] . "'>";
            echo "<input type='date' name='assessmentDate' value='" . ($row["assessmentDate"] ? $row["assessmentDate"] : "") . "'>";
            echo "</td>";
            echo "<td>";
            echo "<button type='submit' class='btn-approve' name='action' value='approve'>Approve</button>";
            echo "<button type='submit' class='btn-reject' name='action' value='reject'>Reject</button>";
            echo "</td>";
            echo "</form>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found.</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>
