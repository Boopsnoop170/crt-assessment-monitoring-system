<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        <h1>Student Login</h1>
        <form action="login_db_connection.php" method="post">
            <!-- Add placeholders for input fields -->
            <label for="learner_id">Student ID:</label>
            <input type="text" id="learner_id" name="learner_id" required placeholder="Type Student ID">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Type Password">
            <button type="submit" name="login">Login</button>
        </form>
        <p>Want to <a href="register.php">Register</a>?</p>
        <p>Are you an <a href="admin_login.php">Admin</a>?</p>
        
    </div>
</body>

</html>