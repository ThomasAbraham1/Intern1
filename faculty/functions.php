<?php
include('../includes/conn.php');

if (isset($_POST["Function"])) {

    if ($_POST["Function"] == "Login") {
        // // execute SQL statement
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM erp_login WHERE log_id='$username' AND log_pwd='$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['user_id'] = $username;
                echo "OK";
            } else {
                echo "Invalid Username Or Password!";
            }
            // close database connection
            mysqli_close($conn);
        }
        // $Route_Name = $_POST["Route_Name"];
        // $Route_No = $_POST["Route_No"];
        // $Drop_Time = $_POST["Drop_Time"];
    }
}
?>