<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register an Account</title>
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
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: white;
            padding: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        p {
            text-align: center;
            margin-top: 15px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
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
<div class="container">
    <h2>Admin Registration Form</h2>
    <form action="admin_admin_register_db.php" method="post">
        <label for="Account_name">Account Name:</label><br>
        <input type="text" id="Account_name" name="Account_name" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>
