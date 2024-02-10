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
            if(!password_verify($confirmPassword,$password)) return "Passwords do not match!";
            global $conn;
            $sql = "INSERT INTO erp_login (f_name, l_name, userName, phone, role,  log_pwd, active)
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

// Edit roles and permissions

if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "editPermission") {
        $permissionId = $_POST["permissionId"];
        $permissionName = $_POST["permissionName"];
        function editPermission($permissionId, $permissionName)
        {
            global $conn;
            $sql = "UPDATE `erp_permission` SET `permissionName` = '$permissionName' WHERE `erp_permission`.`permissionId` = $permissionId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo editPermission($permissionId, $permissionName);
    }
}

if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "editRole") {
        $roleId = $_POST["roleId"];
        $roleName = $_POST["roleName"];
        function editPermission($roleId, $roleName)
        {
            global $conn;
            $sql = "UPDATE `erp_role` SET `roleName` = '$roleName' WHERE `erp_role`.`roleId` = $roleId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo editPermission($roleId, $roleName);
    }
}

//  Assign permission to roles

if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "assignPermission" || $_POST["Function"] == "unAssignPermission") {
        $roleId = $_POST["roleId"];
        $permissionId = $_POST["permissionId"];
        $functionName = $_POST["Function"];
        if ($functionName == 'assignPermission') {
            function assignPermission($roleId, $permissionId)
            {
                global $conn;
                // Getting permission name
                $query = "SELECT permissionName FROM `erp_permission` WHERE permissionId=$permissionId";
                $result = mysqli_query($conn, $query);
                if (!$result) return "Error: " . $query . "<br>" . $conn->error;
                $row = mysqli_fetch_assoc($result);
                $permissionName = $row['permissionName'];
                // Getting role access field
                $sql = "SELECT `access` FROM `erp_role` WHERE `erp_role`.`roleId` = $roleId";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                $row = mysqli_fetch_assoc($result);
                $access = $row['access'];

                if ((empty($access)) != 1) {
                    $access .= ',' . $permissionName;
                    $permissionName = $access;
                    $sql = "UPDATE `erp_role` SET `access` = '$permissionName' WHERE `erp_role`.`roleId` = $roleId";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                    // close database connection
                    mysqli_close($conn);
                    return "OK";
                }
                $sql = "UPDATE `erp_role` SET `access` = '$permissionName' WHERE `erp_role`.`roleId` = $roleId";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                // close database connection
                mysqli_close($conn);
                return "OK";
            }

            echo assignPermission($roleId, $permissionId);
        }
        // If the function is to unassign permission from a role
        if ($functionName == 'unAssignPermission') {
            function unAssignPermission($roleId, $permissionId)
            {
                global $conn;
                // Getting permission name
                $query = "SELECT permissionName FROM `erp_permission` WHERE permissionId=$permissionId";
                $result = mysqli_query($conn, $query);
                if (!$result) return "Error: " . $query . "<br>" . $conn->error;
                $row = mysqli_fetch_assoc($result);
                $permissionName = $row['permissionName'];
                // Getting role access field
                $sql = "SELECT `access` FROM `erp_role` WHERE `erp_role`.`roleId` = $roleId";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                $row = mysqli_fetch_assoc($result);
                $access = $row['access'];
                // Converting CSV into array
                $accessArray = explode(',', $access);
                $searchResultIndex = array_search($permissionName, $accessArray); // Finding index of the permission to be unassigned
                unset($accessArray[$searchResultIndex]);
                // Putting the array back into it's original form which is CSV
                $access = implode(',', $accessArray);

                // Updating the role with permissions after unassigning one
                $sql = "UPDATE `erp_role` SET `access` = '$access' WHERE `erp_role`.`roleId` = $roleId";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                // close database connection
                mysqli_close($conn);
                return "OK";
            }

            echo unAssignPermission($roleId, $permissionId);
        }
    }

    //  Create admission form
    if (isset($_POST["Function"])) {
        if ($_POST["Function"] == "createAdmissionForm") {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $DOB = $_POST["DOB"];
            $mobno = $_POST["mobno"];
            $address = $_POST["address"];
            $userId = $_POST["userId"];
            function createClass($fname, $lname, $userId, $email, $DOB, $mobno, $address)
            {
                global $conn;
                $sql = "INSERT INTO `erp_admission` (`admissionId`,`name`,`userId`, `email`, `dob`, `phone`, `address`) VALUES (NULL, '$fname $lname', '$userId', '$email', '$DOB','$mobno', '$address');";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                // close database connection
                mysqli_close($conn);
                return "OK";
            }

            echo createClass($fname, $lname, $userId, $email, $DOB, $mobno, $address);
        }
    }
    //  Register Course - Student
    if (isset($_POST["Function"])) {
        if ($_POST["Function"] == "registerCourse") {
            $userId = $_POST["userId"];
            $classId = $_POST["classId"];
            $course = $_POST["course"];
            $department = $_POST["department"];
            function createClass($userId, $classId, $course, $department)
            {
                global $conn;
                $sql = "UPDATE `erp_login` SET `course` = '$course', `department` = '$department', `classId` = '$classId' WHERE `erp_login`.`user_id` = $userId";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                // close database connection
                mysqli_close($conn);
                return "OK";
            }

            echo createClass($userId, $classId, $course, $department);
        }
    }
    //  Payment success - Fees
    if (isset($_POST["Function"])) {
        if ($_POST["Function"] == "paymentSuccess") {
            $userId = $_POST["userId"];
            $feeObject = $_POST["feeObject"];
            $feeNames = '';
            $feeAmounts = '';
            foreach($feeObject as $feeName=>$feeAmount){
                $feeNames .= $feeName. '/';
                $feeAmounts .= "$feeAmount". '/';
            }
            $feeNames = rtrim($feeNames, '/');
            $feeAmounts = rtrim($feeAmounts, '/');
            // echo $feeAmounts;

            function paymentSuccess($userId,$feeAmounts,$feeNames)
            {
                global $conn;
                // Updating student paymentStatus
                $sql = "UPDATE `erp_login` SET `paymentStatus` = '1' WHERE `erp_login`.`user_id` = $userId";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                // Creating receipt for paid fees
                $sql = "INSERT INTO `erp_receipt` (`receiptId`, `studentId`,`date`,`feeName`,`amount`) VALUES (NULL, '$userId',CURRENT_DATE,'$feeNames','$feeAmounts')";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                // close database connection
                mysqli_close($conn);
                return "OK";
            }

            echo paymentSuccess($userId,$feeAmounts,$feeNames);
        }
    }

    //  Profile update
    if (isset($_POST["Function"])) {
        if ($_POST["Function"] == "updateProfile") {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $mobno = $_POST["mobno"];
            $userId = $_POST["userId"];
            function updateProfile($fname,$lname,$email,$userId,$mobno)
            {
                global $conn;
                $sql = "UPDATE `erp_login` SET `userName` = '$email', `phone` = '$mobno', `l_name` = '$lname', `f_name` = '$fname' WHERE `erp_login`.`user_id` = $userId";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                // close database connection
                mysqli_close($conn);
                return "OK";
            }

            echo updateProfile($fname,$lname,$email,$userId,$mobno);
        }
    }
}
