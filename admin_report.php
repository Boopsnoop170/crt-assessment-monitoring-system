<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Report</title>
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
            background-color: #6aa84f; /* Green color */
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
        @media only screen and (max-width: 600px) {
            .form-box {
                width: 90%;
            }
        }
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
        .bsit_graduated-button {
            background-color: #2f9fcf;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .bsit_graduated-button:hover {
            background-color: #1c6280;
        }
        .bsais_graduated-button {
            background-color: #2f9fcf;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .bsais_graduated-button:hover {
            background-color: #1c6280;
        }
        .btvte_graduated-button {
            background-color: #2f9fcf;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btvte_graduated-button:hover {
            background-color: #1c6280;
        }
        .bstm_graduated-button {
            background-color: #2f9fcf;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .bstm_graduated-button:hover {
            background-color: #1c6280;
        }
        .hm_graduated-button {
            background-color: #2f9fcf;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .hm_graduated-button:hover {
            background-color: #1c6280;
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

    <h2>ACT/BSIT Assessment</h2>
    <table class="table-bsit">
        <tr>
            <th>Learner ID</th>
            <th>Qualification</th>
            <th>Status</th>
            <th>Assessment Date</th>
            <th>Graduated</th>
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
                
                if ($row["status"] != "Rejected") {
                    echo "<td><button class='bsit_graduated-button' onclick='graduateBSIT(\"" . $row["learnerID"] . "\", \"" . $row["qualification"] . "\")'>Graduated</button></td>";
                } else {
                    echo "<td></td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found.</td></tr>";
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
            <th>Graduated</th>
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
                
                if ($row["status"] != "Rejected") {
                    echo "<td><button class='bsais_graduated-button' onclick='graduateBSAIS(\"" . $row["learnerID"] . "\", \"" . $row["qualification"] . "\")'>Graduated</button></td>";
                } else {
                    echo "<td></td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found.</td></tr>";
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
            <th>Graduated</th>
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
                
                if ($row["status"] != "Rejected") {
                    echo "<td><button class='btvte_graduated-button' onclick='graduateBTVTE(\"" . $row["learnerID"] . "\", \"" . $row["qualification"] . "\")'>Graduated</button></td>";
                } else {
                    echo "<td></td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found.</td></tr>";
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
            <th>Graduated</th>
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
                
                if ($row["status"] != "Rejected") {
                    echo "<td><button class='bstm_graduated-button' onclick='graduateBSTM(\"" . $row["learnerID"] . "\", \"" . $row["qualification"] . "\")'>Graduated</button></td>";
                } else {
                    echo "<td></td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found.</td></tr>";
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
            <th>Graduated</th>
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
                
                if ($row["status"] != "Rejected") {
                    // Add a button labeled "Graduated" with onclick event
                    echo "<td><button class='hm_graduated-button' onclick='graduateHM(\"" . $row["learnerID"] . "\", \"" . $row["qualification"] . "\")'>Graduated</button></td>";
                } else {
                    echo "<td></td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <br>
    
    <script>
        function graduateBSIT(learnerID, qualification) {
            // Send AJAX request
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                }
            };
            xhr.open("POST", "update_bsit_specialization.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("learnerID=" + learnerID + "&qualification=" + qualification);
        }
    </script>

    <script>
        function graduateBSAIS(learnerID, qualification) {
            // Send AJAX request
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                }
            };
            xhr.open("POST", "update_bsais_specialization.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("learnerID=" + learnerID + "&qualification=" + qualification);
        }
    </script>

    <script>
        function graduateBTVTE(learnerID, qualification) {
            // Send AJAX request
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                }
            };
            xhr.open("POST", "update_btvte_specialization.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("learnerID=" + learnerID + "&qualification=" + qualification);
        }
    </script>

    <script>
        function graduateBSTM(learnerID, qualification) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                }
            };
            xhr.open("POST", "update_bstm_specialization.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("learnerID=" + learnerID + "&qualification=" + qualification);
        }
    </script>

    <script>
        function graduateHM(learnerID, qualification) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                }
            };
            xhr.open("POST", "update_hm_specialization.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("learnerID=" + learnerID + "&qualification=" + qualification);
        }
    </script>

</body>
</html>
