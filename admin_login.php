<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Page</title>
    <link rel="icon" href="crt-logo.png">
    <style>
       .login-box {
            width: 300px;
            padding: 10px 15px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin: auto;
            margin-top: 100px;
            border-radius: 5px;
        }

       .login-box h1 {
            text-align: center;
            margin-bottom: 20px;
        }

       .login-box label {
            display: block;
            margin-bottom: 5px;
        }

       .login-box input[type="text"],
       .login-box input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .login-box button[type="submit"] {
            width: 100%;
            padding: 8px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .login-box button[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Admin Login</h1>
        <form action="admin_login_db_connection.php" method="post">
            <label for="Account_name">Account Name:</label>
            <input type="text" id="Account_name" name="Account_name" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="login">Login</button>

        </form>

        <p>Are you a <a href="login.php">user</a>?</p>
    </div>
</body>
</html>