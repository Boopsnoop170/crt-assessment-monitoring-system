<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link rel="icon" href="crt-logo.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
        input[type="submit"],
        .login-button {
            width: 100%;
            background-color: #4caf50;
            color: white;
            padding: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover,
        .login-button:hover {
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
        .login-button {
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>User Registration Form</h2>
        <form action="admin_user_register_db.php" method="post">
            <label for="Account_name">Student ID:</label><br>
            <input type="text" id="Account_name" name="Account_name" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Register">
        </form>
        <button class="login-button" onclick="window.location.href='login.php'">Click to go back to Login page</button>
    </div>
    
</body>
</html>
