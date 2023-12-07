<?php
session_start();
include('../includes/conn.php');

if(isset($_POST["Function"])) {

    if ($_POST["Function"] == "Login") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM erp_login WHERE log_id='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $hashed_password = $row['log_pwd'];
                $_SESSION['user_id'] = $row['user_id'];
            }
            if (password_verify($password, $hashed_password)) {
                echo "OK";
            }
        } else {
            echo "Invalid Username Or Password!";
        }
        // close database connection
        mysqli_close($conn);
        // $Route_Name = $_POST["Route_Name"];
        // $Route_No = $_POST["Route_No"];
        // $Drop_Time = $_POST["Drop_Time"];
    }
}

if (isset($_POST["Function"])) {

    if ($_POST["Function"] == "signup") {
        // // execute SQL statement {
        $firstName = $_POST['fullName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hasing the password
        $confirmPassword = $_POST['confirmPassword'];


        $sql = "INSERT INTO erp_login (f_name, l_name, log_id, phone, role,  log_pwd, log_status)
            VALUES ('$firstName', '$lastName', '$email', '$phone', 'student', '$password', 0);
            ";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $sql = "SELECT user_id FROM erp_login WHERE log_id = '$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION["user_id"] = $row["user_id"];
                }
                echo "OK";
            } else {
                echo "Error in retrieval of user_id";
            }
        } else {
            echo "Invalid Username Or Password!";
        }
        // close database connection
        mysqli_close($conn);
        // $Route_Name = $_POST["Route_Name"];
        // $Route_No = $_POST["Route_No"];
        // $Drop_Time = $_POST["Drop_Time"];
    }
}
