<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Approve or Reject Items</title>
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

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #f5f5f5;
        }

        form {
            display: inline-block;
        }

        .action-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .action-button:hover {
            background-color: #45a049;
        }

        .reject-button {
            background-color: #f44336;
        }

        .reject-button:hover {
            background-color: #da190b;
        }

        .thumbnail {
            max-width: 100px;
            max-height: 100px;
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

<h2>Student Register Approval</h2>

<table>
    <tr>
        <th>Learner ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Courses</th>
        <th>Specializations</th>
        <th>Image</th>
        <th>Status</th>
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

$sql = "SELECT * FROM learners WHERE status NOT IN ('Approved', 'Rejected')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["learner_id"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["middlename"] . "</td>";
        echo "<td>" . $row["courses"] . "</td>";
        echo "<td>";
        echo "<ul>";
        $accomplished_nc_items = explode(',', $row["specialization"]);
        foreach ($accomplished_nc_items as $item) {
            echo "<li>$item</li>";
        }
        echo "</ul>";
        echo "</td>";
        echo "<td><img class='thumbnail' src='uploads/" . $row['image'] . "' alt='Image'></td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>";
        echo "<form action='admin_process_db.php' method='post'>";
        echo "<input type='hidden' name='action' value='approve'>";
        echo "<input type='hidden' name='learner_id' value='" . $row["learner_id"] . "'>";
        echo "<input class='action-button' type='submit' value='Approve'>";
        echo "</form>";
        echo "<form action='admin_process_db.php' method='post'>";
        echo "<input type='hidden' name='action' value='reject'>";
        echo "<input type='hidden' name='learner_id' value='" . $row["learner_id"] . "'>";
        echo "<input class='action-button reject-button' type='submit' value='Reject'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No items found.</td></tr>";
}

$conn->close();

?>


</table>

</body>
</html>
