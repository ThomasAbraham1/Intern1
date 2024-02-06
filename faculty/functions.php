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

        echo login('faculty');
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
            $department = $_POST['department'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hasing the password
            $confirmPassword = $_POST['confirmPassword'];
            global $conn;
            $sql = "INSERT INTO erp_login (f_name, l_name, userName, phone, role,  log_pwd, active, department)
            VALUES ('$firstName', '$lastName', '$email', '$phone', '$roleName', '$password', 0, '$department');
            ";
            $result = mysqli_query($conn, $sql);
            if (!$result) echo "Error: " . $sql . "<br>" . $conn->error;
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
        echo signUp('faculty');
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
    //  Profile update
    if (isset($_POST["Function"])) {
        if ($_POST["Function"] == "updateProfile") {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $mobno = $_POST["mobno"];
            $userId = $_POST["userId"];
            function updateProfile($fname, $lname, $email, $userId, $mobno)
            {
                global $conn;
                $sql = "UPDATE `erp_login` SET `userName` = '$email', `phone` = '$mobno', `l_name` = '$lname', `f_name` = '$fname' WHERE `erp_login`.`user_id` = $userId";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                // close database connection
                mysqli_close($conn);
                return "OK";
            }

            echo updateProfile($fname, $lname, $email, $userId, $mobno);
        }
    }

    //  Mark attendance
    if (isset($_POST["Function"])) {
        if ($_POST["Function"] == "markAttendance") {
            $subjectCode = $_POST["subjectCode"];
            $studentId = $_POST["studentId"];
            $staffId = $_POST["staffId"];
            $day = $_POST["day"];
            $period = $_POST["period"];
            $classId = $_POST["classId"];
            $isPresent = $_POST["isPresent"];
            function markAttendance($isPresent, $classId, $day, $staffId, $studentId, $subjectCode, $period)
            {
                global $conn;
                $date = date('Y-m-d');
                // Check if record already exists for a subject's specific period
                $sql = "SELECT * FROM erp_attendance WHERE date='$date' AND studentId =$studentId AND classId=$classId AND subjectCode='$subjectCode' AND period=$period";
                $result = mysqli_query($conn, $sql);
                $doesRowExist = mysqli_num_rows($result);
                if (!$doesRowExist) {
                    $sql = "INSERT INTO `erp_attendance` (`attendanceId`, `classId`, `subjectCode`, `period`, `studentId`, `staffId`, `date`, `day`, `status`) VALUES (NULL, '$classId', '$subjectCode','$period', '$studentId', '$staffId', '$date', '$day', '$isPresent')";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                    // close database connection
                    mysqli_close($conn);
                    return "OK";
                }
                $attendanceId = $result->fetch_assoc()['attendanceId'];
                $sql = "UPDATE `erp_attendance` SET `subjectCode` = '$subjectCode', `period` = '$period', `studentId` = '$studentId', `staffId` = '$staffId', `date` = '$date', `day` = '$day', `status` = '$isPresent' WHERE `erp_attendance`.`attendanceId` = $attendanceId";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                // close database connection
                mysqli_close($conn);
                return "OK";
            }

            echo markAttendance($isPresent, $classId, $day, $staffId, $studentId, $subjectCode, $period);
        }
    }
}

//  Generate grading sheet
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "generateGradingSheet") {
        $classId = $_POST["classId"];
        function generateGradingSheet($classId)
        {
            global $conn;
            $sql = "SELECT * FROM erp_login where classId = $classId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            $students = array();
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }

            foreach ($students as $student) {
?>
                <tr>
                    <td><?php echo $student['user_id'] ?></td>
                    <td><?php echo $student['f_name'] . $student['l_name'] ?></td>
                    <td><input class='form-control' type='number' value=''></td>
                </tr>
<?php
            }
            // close database connection
            mysqli_close($conn);
            return "|OK";
        }

        echo generateGradingSheet($classId);
    }
}


//  Save grading sheet
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "saveGradingSheet") {
        $studentMarkData = $_POST["studentMarkData"];
        function saveGradingSheet($studentMarkData)
        {
            global $conn;
            foreach ($studentMarkData as $studentMarkRecord) {
                $sql = "INSERT INTO `erp_grade` (`gradeId`, `subjectCode`, `subjectName`, `examName`, `mark`) VALUES (NULL, 'asda', 'adasdsa', 'adsa', '1231'), (NULL, 'asdas', 'asdas', 'asda', '123')";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            }

            // close database connection
            mysqli_close($conn);
            // return "|OK";
        }

        echo saveGradingSheet($studentMarkData);
        print_r($studentMarkData);
    }
}


?>