<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        @media only screen and (max-width: 600px) {
            .form-box {
                width: 90%;
            }
        }

        .centered-form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .centered-form h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2f9fcf;
        }

        .form-field {
            margin-bottom: 20px;
        }

        .form-field label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-field input[type="text"],
        .form-field input[type="file"],
        .form-field select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .checkbox-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .checkbox-box label {
            font-weight: bold;
            color: #333;
        }

        .checkbox-box ul {
            list-style-type: none;
            padding: 0;
        }

        .checkbox-box li {
            margin-top: 10px;
        }

        .checkbox-box li input[type="checkbox"] {
            margin-right: 10px;
        }

        .checkbox-box li span {
            font-size: 16px;
        }

        .form-field.button {
            background-color: #2f9fcf;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .form-field.button:hover {
            background-color: #f4d03f;
        }

        .form-line {
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="centered-form">
        <h2>Register Learner</h2>
        <form action="register_db_connection.php" method="post" enctype="multipart/form-data" class="form-box">
            <div class="form-field">
                <label for="learner_id">Learner ID:</label>
                <input type="text" id="learner_id" name="learner_id" required>
            </div>
            <div class="form-field">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="form-field">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="form-field">
                <label for="middlename">Middle Name:</label>
                <input type="text" id="middlename" name="middlename" required>
            </div>
            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-field">
                <label for="courses">Course:</label>
                <div class="select-style">
                    <select id="courses" name="courses" required>
                        <option value="" disabled selected>Select a course</option>
                        <option value="ACT/BSIT">ACT/BSIT</option>
                        <option value="BSAIS">BSAIS</option>
                        <option value="BTVTE">BTVTE</option>
                        <option value="BSTM">BSTM</option>
                        <option value="HM">HM</option>
                    </select>
                </div>
            </div>
            <div class="form-field">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" required>
            </div>
            <div class="form-field">
    <div class="checkbox-box">
        <label for="specialization">Accomplished NC</label>
        <ul>
            <label>BSIT</label>
            <li><input type="checkbox" id="BSIT_CSSNCII" name="specializations[]" value="BSIT: COMPUTER SYSTEM SERVICING NC II"><span>COMPUTER SYSTEM SERVICING NC II</span></li>
            <li><input type="checkbox" id="BSIT_EMSNCIII" name="specializations[]" value="BSIT: EVENT MANAGEMENT SERVICES NC III"><span>EVENT MANAGEMENT SERVICES NC III</span></li>
            <li><input type="checkbox" id="BSIT_BKNCIII" name="specializations[]" value="BSIT: BOOKKEEPING NC III"><span>BOOKKEEPING NC III</span></li><br>

            <label>BSAIS</label>
            <li><input type="checkbox" id="BSAIS_EMSNCIII" name="specializations[]" value="BSAIS: EVENT MANAGEMENT SERVICES NC III"><span>EVENT MANAGEMENT SERVICES NC III</span></li>
            <li><input type="checkbox" id="BSAIS_BKNCIII" name="specializations[]" value="BSAIS: BOOKKEEPING NC III"><span>BOOKKEEPING NC III</span></li><br>

            <label>BTVTE</label>
            <li><input type="checkbox" id="BTVTE_FBSNCII" name="specializations[]" value="BTVTE: FOOD & BEVERAGE SERVICE NC II"><span>FOOD & BEVERAGE SERVICE NC II</span></li>
            <li><input type="checkbox" id="BTVTE_BARTNCII" name="specializations[]" value="BTVTE: BARTENDING NC II"><span>BARTENDING NC II</span></li>
            <li><input type="checkbox" id="BTVTE_BPDNCII" name="specializations[]" value="BTVTE: BREAD & PASTRY PRODUCTION NC II"><span>BREAD & PASTRY PRODUCTION NC II</span></li><br>

            <label>BSTM</label>
            <li><input type="checkbox" id="BSTM_FOSNCII" name="specializations[]" value="BSTM: FRONT OFFICE SERVICES NC II"><span>FRONT OFFICE SERVICES NC II</span></li>
            <li><input type="checkbox" id="BSTM_TPSNCII" name="specializations[]" value="BSTM: TOURISM PROMOTION SERVICES NC II"><span>TOURISM PROMOTION SERVICES NC II</span></li>
            <li><input type="checkbox" id="BSTM_EMSNCIII" name="specializations[]" value="BSTM: EVENT MANAGEMENT SERVICES NC III"><span>EVENT MANAGEMENT SERVICES NC III</span></li><br>

            <label>HM</label>
            <li><input type="checkbox" id="HM_HKNCII" name="specializations[]" value="HM: HOUSE KEEPING NC II"><span>HOUSE KEEPING NC II</span></li>
            <li><input type="checkbox" id="HM_FBSNCII" name="specializations[]" value="HM: FOOD & BEVERAGE SERVICE NC II"><span>FOOD & BEVERAGE SERVICE NC II</span></li>
            <li><input type="checkbox" id="HM_BARTNCII" name="specializations[]" value="HM: BARTENDING NC II"><span>BARTENDING NC II</span></li>
            <li><input type="checkbox" id="HM_FOSNCII" name="specializations[]" value="HM: FRONT OFFICE SERVICES NC II"><span>FRONT OFFICE SERVICES NC II</span></li>
            <li><input type="checkbox" id="HM_EMSNCIII" name="specializations[]" value="HM: EVENT MANAGEMENT SERVICES NC III"><span>EVENT MANAGEMENT SERVICES NC III</span></li><br>
        </ul>
    </div>
</div>


            <input type="submit" value="Submit" class="form-field button">
        </form><br>
        <!-- Add a line below the form -->
        <div class="form-line"></div>
        <button onclick="window.location.href='login.php'">Click to go back to Login page</button>
    </div>

    <script>
        // Check if the success parameter is present in the URL and its value is 1
        if (window.location.search.includes('success=1')) {
            // Show the success alert
            alert("Learner Registered Successfully");
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
