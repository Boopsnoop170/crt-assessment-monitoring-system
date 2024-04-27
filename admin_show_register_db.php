<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Learners</title>
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
            background-color: #6aa84f;
            min-width: 120px;
            z-index: 1;
            border: 4px solid #3d632d; /* Thicker border */
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
        .backup-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            text-decoration: none;
        }

        .backup-button button {
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

        .backup-button button:hover {
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
        .search-bar {
        display: flex;
        align-items: center;
        margin-right: 15px;
        }

        .search-bar form {
            display: flex;
            align-items: center;
        }

        .search-bar input[type="search"] {
            border: 2px solid #6aa84f; /* Green color */
            background-color: #fff;
            padding: 10px 15px;
            outline: none;
            border-radius: 4px;
            margin-right: 5px;
            height: 38px;
            font-size: 16px;
            width: 200px; /* Adjust width as needed */
        }

        .search-bar input[type="submit"] {
            background-color: #6aa84f; /* Green color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            outline: none;
            margin: 0;
        }

        .search-bar input[type="submit"]:hover {
            background-color: #3d632d; /* Darker shade of green */
        }

    </style>
</head>
<body>
    <!-- Navigation bar code added here -->
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
        <div class="search-bar">
            <form action="#" method="get">
                <input type="search" name="search" placeholder="Search Learner by ID">
                <input type="submit" value="Search">
            </form>
        </div>
        <div class="logout">
            <a href="login.php">Logout</a>
        </div>
    </nav>
    <!-- Navigation bar code added above -->

    <h1 style="text-align: center;">Registered Learners</h1>

    <table>
        <thead>
            <tr>
                <th>Learner ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Courses</th>
                <th>Accomplished NC</th>
                <th>Image</th>
                <th>Update</th>
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

// Fetch the data from the database
$search_query = isset($_GET['search'])? $_GET['search'] : '';
$sql = "SELECT * FROM learners WHERE (learner_id LIKE '%$search_query%' OR lastname LIKE '%$search_query%' OR firstname LIKE '%$search_query%' OR middlename LIKE '%$search_query%') AND status = 'Approved'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["learner_id"]. "</td>";
        echo "<td>". $row["lastname"]. "</td>";
        echo "<td>". $row["firstname"]. "</td>";
        echo "<td>". $row["middlename"]. "</td>";
        echo "<td>". $row["courses"]. "</td>"; // Display Courses column data

        // Split "Accomplished NC" into items and display as a list
        echo "<td>";
        echo "<ul>";
        $accomplished_nc_items = explode(',', $row["specialization"]);
        foreach ($accomplished_nc_items as $item) {
            echo "<li>$item</li>";
        }
        echo "</ul>";
        echo "</td>";

        echo "<td><img src='uploads/". $row["image"]. "' alt='Image' width='100'></td>";
        echo "<td>";
        echo "<form action='update_register_db.php' method='post'>";
        echo "<input type='hidden' name='id' value='". $row["id"]. "'>";
        echo "<button type='submit'>Update</button>";
        echo "</form>";
        echo "</td>";
        echo "<td>";
        echo "<form action='delete_register_db.php' method='post' onsubmit='return confirmDeletion()'>";
        echo "<input type='hidden' name='id' value='". $row["id"]. "'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No data found.</td></tr>";
}

// Close the database connection
$conn->close();
?>

        </tbody>
    </table>
<br>
<hr>

<br>


    <script>
        // JavaScript code for confirmation dialog
        function confirmDeletion() {
            return confirm("Are you sure you want to delete this learner?");
        }
    </script>

    <script>
        // JavaScript code for sorting table by column in A to Z order
        document.addEventListener("DOMContentLoaded", function () {
            const headers = document.querySelectorAll("th:not(:nth-last-child(-n+3))"); // Exclude the last three columns
            headers.forEach((header, index) => {
                const icon = document.createElement("i");
                icon.classList.add("fas", "fa-sort");
                icon.style.marginLeft = "5px";
                header.appendChild(icon);
                header.addEventListener("click", () => {
                    sortTable(index);
                });
            });

            function sortTable(columnIndex) {
                const table = document.querySelector("table");
                const rows = Array.from(table.querySelectorAll("tr")).slice(1); // Exclude header row
                rows.sort((a, b) => {
                    const aValue = a.cells[columnIndex].textContent.trim();
                    const bValue = b.cells[columnIndex].textContent.trim();
                    return aValue.localeCompare(bValue);
                });
                rows.forEach(row => table.appendChild(row));
                headers.forEach(header => header.querySelector("i").className = "fas fa-sort");
                headers[columnIndex].querySelector("i").className = "fas fa-caret-up";
            }
        });
    </script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
