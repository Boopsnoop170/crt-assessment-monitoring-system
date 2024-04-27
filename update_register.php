<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link rel="icon" href="crt-logo.png">
    <style>
        /* Form styling */
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
        <?php
        // Check if ID is provided in the URL
        if(isset($_GET['id']) && !empty($_GET['id'])){
            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "register_db";
            $port = 3307;

            $conn = new mysqli($servername, $username, $password, $dbname, $port);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare a SQL statement to fetch the record based on ID
            $id = $_GET['id'];
            $sql = "SELECT * FROM learners WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Fetch the record
                $row = $result->fetch_assoc();
                ?>
                <div class="form-box">
                    <h2 class="form-title">Update Record</h2>
                    <form action="update_register_process.php" method="post" enctype="multipart/form-data">
                        <!-- Hidden field to store the ID -->
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <!-- Form fields to update the record -->
                        <div class="form-field">
                            <label for="learner_id">Learner ID:</label>
                            <input type="text" id="learner_id" name="learner_id" value="<?php echo $row['learner_id']; ?>" required>
                        </div>
                        <div class="form-field">
                            <label for="lastname">Last Name:</label>
                            <input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" required>
                        </div>
                        <div class="form-field">
                            <label for="firstname">First Name:</label>
                            <input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" required>
                        </div>
                        <div class="form-field">
                            <label for="middlename">Middle Name:</label>
                            <input type="text" id="middlename" name="middlename" value="<?php echo $row['middlename']; ?>" required>
                        </div>
                        <div class="form-field">
                            <label for="courses">Courses:</label>
                            <select id="courses" name="courses" required>
                                <option value="" disabled>Select a course</option>
                                <option value="ACT/BSIT" <?php if($row['courses'] == "ACT/BSIT") echo "selected"; ?>>ACT/BSIT</option>
                                <option value="BSAIS" <?php if($row['courses'] == "BSAIS") echo "selected"; ?>>BSAIS</option>
                                <option value="BTVTE" <?php if($row['courses'] == "BTVTE") echo "selected"; ?>>BTVTE</option>
                                <option value="BSTM" <?php if($row['courses'] == "BSTM") echo "selected"; ?>>BSTM</option>
                                <option value="HM" <?php if($row['courses'] == "HM") echo "selected"; ?>>HM</option>
                            </select>
                        </div>
                        <div class="form-field">
    <label for="specializations">Accomplished NC:</label>
    <div class="checkbox-list">
        <label>BSIT</label>
        <input type="checkbox" id="BSIT_CSSNCII" name="specializations[]" value="BSIT: COMPUTER SYSTEM SERVICING NC II" <?php if(strpos($row['specialization'], "BSIT: COMPUTER SYSTEM SERVICING NC II") !== false) echo "checked"; ?>><span>COMPUTER SYSTEM SERVICING NC II</span><br>
        <input type="checkbox" id="BSIT_EMSNCIII" name="specializations[]" value="BSIT: EVENT MANAGEMENT SERVICES NC III" <?php if(strpos($row['specialization'], "BSIT: EVENT MANAGEMENT SERVICES NC III") !== false) echo "checked"; ?>><span>EVENT MANAGEMENT SERVICES NC III</span><br>
        <input type="checkbox" id="BSIT_BKNCIII" name="specializations[]" value="BSIT: BOOKKEEPING NC III" <?php if(strpos($row['specialization'], "BSIT: BOOKKEEPING NC III") !== false) echo "checked"; ?>><span>BOOKKEEPING NC III</span><br>

        <label>BSAIS</label>
        <input type="checkbox" id="BSAIS_EMSNCIII" name="specializations[]" value="BSAIS: EVENT MANAGEMENT SERVICES NC III" <?php if(strpos($row['specialization'], "BSAIS: EVENT MANAGEMENT SERVICES NC III") !== false) echo "checked"; ?>><span>EVENT MANAGEMENT SERVICES NC III</span><br>
        <input type="checkbox" id="BSAIS_BKNCIII" name="specializations[]" value="BSAIS: BOOKKEEPING NC III" <?php if(strpos($row['specialization'], "BSAIS: BOOKKEEPING NC III") !== false) echo "checked"; ?>><span>BOOKKEEPING NC III</span><br>

        <label>BTVTE</label>
        <input type="checkbox" id="BTVTE_FBSNCII" name="specializations[]" value="BTVTE: FOOD & BEVERAGE SERVICE NC II" <?php if(strpos($row['specialization'], "BTVTE: FOOD & BEVERAGE SERVICE NC II") !== false) echo "checked"; ?>><span>FOOD & BEVERAGE SERVICE NC II</span><br>
        <input type="checkbox" id="BTVTE_BARTNCII" name="specializations[]" value="BTVTE: BARTENDING NC II" <?php if(strpos($row['specialization'], "BTVTE: BARTENDING NC II") !== false) echo "checked"; ?>><span>BARTENDING NC II</span><br>
        <input type="checkbox" id="BTVTE_BPDNCII" name="specializations[]" value="BTVTE: BREAD & PASTRY PRODUCTION NC II" <?php if(strpos($row['specialization'], "BTVTE: BREAD & PASTRY PRODUCTION NC II") !== false) echo "checked"; ?>><span>BREAD & PASTRY PRODUCTION NC II</span><br>

        <label>BSTM</label>
        <input type="checkbox" id="BSTM_FOSNCII" name="specializations[]" value="BSTM: FRONT OFFICE SERVICES NC II" <?php if(strpos($row['specialization'], "BSTM: FRONT OFFICE SERVICES NC II") !== false) echo "checked"; ?>><span>FRONT OFFICE SERVICES NC II</span><br>
        <input type="checkbox" id="BSTM_TPSNCII" name="specializations[]" value="BSTM: TOURISM PROMOTION SERVICES NC II" <?php if(strpos($row['specialization'], "BSTM: TOURISM PROMOTION SERVICES NC II") !== false) echo "checked"; ?>><span>TOURISM PROMOTION SERVICES NC II</span><br>
        <input type="checkbox" id="BSTM_EMSNCIII" name="specializations[]" value="BSTM: EVENT MANAGEMENT SERVICES NC III" <?php if(strpos($row['specialization'], "BSTM: EVENT MANAGEMENT SERVICES NC III") !== false) echo "checked"; ?>><span>EVENT MANAGEMENT SERVICES NC III</span><br>

        <label>HM</label>
        <input type="checkbox" id="HM_HKNCII" name="specializations[]" value="HM: HOUSE KEEPING NC II" <?php if(strpos($row['specialization'], "HM: HOUSE KEEPING NC II") !== false) echo "checked"; ?>><span>HOUSE KEEPING NC II</span><br>
        <input type="checkbox" id="HM_FBSNCII" name="specializations[]" value="HM: FOOD & BEVERAGE SERVICE NC II" <?php if(strpos($row['specialization'], "HM: FOOD & BEVERAGE SERVICE NC II") !== false) echo "checked"; ?>><span>FOOD & BEVERAGE SERVICE NC II</span><br>
        <input type="checkbox" id="HM_BARTNCII" name="specializations[]" value="HM: BARTENDING NC II" <?php if(strpos($row['specialization'], "HM: BARTENDING NC II") !== false) echo "checked"; ?>><span>BARTENDING NC II</span><br>
        <input type="checkbox" id="HM_FOSNCII" name="specializations[]" value="HM: FRONT OFFICE SERVICES NC II" <?php if(strpos($row['specialization'], "HM: FRONT OFFICE SERVICES NC II") !== false) echo "checked"; ?>><span>FRONT OFFICE SERVICES NC II</span><br>
        <input type="checkbox" id="HM_EMSNCIII" name="specializations[]" value="HM: EVENT MANAGEMENT SERVICES NC III" <?php if(strpos($row['specialization'], "HM: EVENT MANAGEMENT SERVICES NC III") !== false) echo "checked"; ?>><span>EVENT MANAGEMENT SERVICES NC III</span><br>
    </div>
</div>


                        <div class="form-field">
                            <label for="image">Image:</label><br>
                            <img src="uploads/<?php echo $row['image']; ?>" alt="Existing image" width="150">
                            <input type="file" id="image" name="image" class="form-field">
                        </div>
                        <input type="submit" value="Update" class="form-field button">
                    </form>
                </div>
                <?php
            } else {
                echo "No record found with the provided ID.";
            }

            // Close the database connection
            $conn->close();
        } else {
            echo "No ID provided.";
        }
        ?>
    </div>
</body>
</html>
