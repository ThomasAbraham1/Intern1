<?php
session_start();
include('../includes/conn.php');

if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "Login") {

        function login($roleCheckValue)
        {
            $username = $_POST["username"];
            $password = $_POST["password"];
            global $conn;
            $sql = "SELECT * FROM erp_login WHERE userName='$username'";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $hashedPassword = $row['log_pwd'];
                $userId = $row['user_id'];
                $roleName = $row['role'];
            }
            if (mysqli_num_rows($result) < 1) return "Account doesn't exist, register first!";
            if ($roleName != $roleCheckValue) return "Account appears to be " . $roleName . " account, use respective login page";
            if (!password_verify($password, $hashedPassword)) return "Invalid password";
            $_SESSION['user_id'] = $userId;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo login('student');
    }
}

if (isset($_POST["Function"])) {

    if ($_POST["Function"] == "signup") {
        function signUp($roleName)
        {
            $firstName = $_POST['fullName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hasing the password
            $confirmPassword = $_POST['confirmPassword'];
            global $conn;
            $sql = "INSERT INTO erp_login (f_name, l_name, userName, phone, role,  log_pwd, log_status)
            VALUES ('$firstName', '$lastName', '$email', '$phone', '$roleName', '$password', 0);
            ";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            $sql = "SELECT user_id FROM erp_login WHERE userName = '$email'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $userId = $row["user_id"];
            }
            if (mysqli_num_rows($result) != 1) return "Error in acount info retrieval";
            $_SESSION["user_id"] = $userId;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }
        echo signUp('student');
    }
}

// Creation of roles and permission

if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "createPermission") {
        $newPermissionName = $_POST["newPermissionName"];
        function createPermission($newPermissionName)
        {
            global $conn;
            $sql = "INSERT INTO `erp_permission` (`permissionName`) VALUES ('$newPermissionName')";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo createPermission($newPermissionName);
    }
}

if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "createRole") {
        $newRoleName = $_POST["newRoleName"];
        function createRole($newRoleName)
        {
            global $conn;
            $sql = "INSERT INTO `erp_role` (`roleName`) VALUES ('$newRoleName')";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo createRole($newRoleName);
    }
}

// Deletion of roles and permissions

if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "deleteRole") {
        $roleId = $_POST["roleId"];
        function deleteRole($roleId)
        {
            global $conn;
            $sql = "DELETE FROM erp_role WHERE `erp_role`.`roleId` = $roleId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo deleteRole($roleId);
    }
}

if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "deletePermission") {
        $permissionId = $_POST["permissionId"];
        function deletePermission($permissionId)
        {
            global $conn;
            $sql = "DELETE FROM erp_permission WHERE `permissionId` = $permissionId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo deletePermission($permissionId);
    }
}
