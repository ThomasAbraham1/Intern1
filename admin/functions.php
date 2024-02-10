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

        echo login('admin');
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
        echo signUp('admin');
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
}

//  Create course
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "createCourse") {
        $courseName = $_POST["courseName"];
        function createCourse($courseName)
        {
            global $conn;
            $sql = "INSERT INTO `erp_course` (`courseId`, `courseName`) VALUES ('', '$courseName')";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo createCourse($courseName);
    }
}

//  Create Subject
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "createSubject") {
        $subjectName = $_POST["subjectName"];
        $subjectCode = $_POST["subjectCode"];
        $classId = $_POST["classId"];
        $staffId = $_POST["staffId"];
        function createSubject($subjectCode, $subjectName, $classId, $staffId)
        {
            global $conn;
            $sql = "INSERT INTO `erp_subject` (`subjectId`, `subjectCode`, `subjectName`,`classId`,`staffId`) VALUES (NULL, '$subjectCode', '$subjectName','$classId', '$staffId')";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo createSubject($subjectCode, $subjectName, $classId, $staffId);
    }
}

//  Create Class
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "createClass") {
        $startingYear = $_POST["startingYear"];
        $endingYear = $_POST["endingYear"];
        $department = $_POST["department"];
        $course = $_POST["course"];
        function createClass($startingYear, $endingYear, $department, $course)
        {
            global $conn;
            $sql = "INSERT INTO `erp_class` (`classId`, `startingYear`, `endingYear`, `semester`, `department`, `course`) VALUES (NULL, '$startingYear', '$endingYear', '1', '$department','$course')";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo createClass($startingYear, $endingYear, $department, $course);
    }
}

//  Create Timetable
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "createTimetable") {
        $timeTable = json_decode($_POST["timeTable"]);
        $classId = $_POST["classId"];
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
        function createTimetable($timeTable, $classId, $days)
        {
            global $conn;
            // Outer loop - for each day
            for ($i = 0; $i < count($timeTable); $i++) {
                $day = $days[$i];
                $period = 0;
                // Inner loop - inserting periods for each day
                foreach ($timeTable[$i] as $subject) {
                    $period = $period + 1;
                    $sql = "INSERT INTO `erp_timetable` (`timeTableId`, `classId`, `day`, `period`, `subjectCode`) VALUES (NULL, '$classId', '$day', '$period','$subject')";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo createTimetable($timeTable, $classId, $days);
        // echo count($timeTable);
    }
}

// Edit admission Form

if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "updateAdmissionForm") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $dob = $_POST["dob"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $userId = $_POST["userId"];
        function updateAdmissionForm($name, $email, $dob, $phone, $address, $userId)
        {
            global $conn;
            $sql = "UPDATE `erp_admission` SET `name` = '$name',`dob`='$dob', `email` = '$email', `phone` = '$phone', `address` = '$address' WHERE `erp_admission`.`userId` = $userId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo updateAdmissionForm($name, $email, $dob, $phone, $address, $userId);
    }
}

// Accept or reject admission form
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "admissionOrNot") {
        $statusChangeBtnValue = $_POST["statusChangeBtnValue"];
        $userId = $_POST["userId"];
        function updateAdmissionForm($userId, $statusChangeBtnValue)
        {
            global $conn;
            if ($statusChangeBtnValue == 'Accept') {
                $sql = "UPDATE `erp_login` SET `active` = '1' WHERE `erp_login`.`user_id` = $userId";
                $sql2 = "DELETE FROM erp_admission WHERE `erp_admission`.`userId` = $userId";
                $result = mysqli_query($conn, $sql);
                $result2 = mysqli_query($conn, $sql2);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                if (!$result2) return "Error: " . $sql2 . "<br>" . $conn->error;
                // close database connection
                mysqli_close($conn);
                return "OK";
            }
            $sql = "DELETE FROM erp_admission WHERE `erp_admission`.`userId` = $userId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo updateAdmissionForm($userId, $statusChangeBtnValue);
    }
}

//  Create Fees
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "createFees") {
        $classId = $_POST["classId"];
        $feeName = $_POST["feeName"];
        $amount = $_POST["amount"];
        function createCourse($classId, $feeName, $amount)
        {
            global $conn;
            $sql = "INSERT INTO `erp_fees` (`feesId`, `feeName`, `classId`, `amount`) VALUES (NULL, '$feeName', '$classId', '$amount')";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo createCourse($classId, $feeName, $amount);
    }
}

// Edit Fees

if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "updateFees") {
        $classId = $_POST["classId"];
        $feeName = $_POST["feeName"];
        $amount = $_POST["amount"];
        $feeId = $_POST["feeId"];
        function updateFees($classId, $feeName, $amount, $feeId)
        {
            global $conn;
            $sql = "UPDATE `erp_fees` SET `feeName` = '$feeName', `classId` = '$classId', `amount` = '$amount' WHERE `erp_fees`.`feesId` = $feeId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo updateFees($classId, $feeName, $amount, $feeId);
    }
}

// Delete Fees
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "deleteFees") {
        $feeId = $_POST["feeId"];
        function deleteFees($feeId)
        {
            global $conn;
            $sql = "DELETE FROM erp_fees WHERE `erp_fees`.`feesId` = $feeId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo deleteFees($feeId);
    }
}

// Promote class
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "promoteClass") {
        $classId = $_POST["classId"];
        function promoteClass($classId)
        {
            global $conn;
            // promote class
            $sql = "UPDATE `erp_class` SET `semester` = semester+1 WHERE `erp_class`.`classId` = $classId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // renew payment for next semester / reset payment status for students
            $sql = "UPDATE `erp_login` SET `paymentStatus` = '0' WHERE `erp_login`.`classId` = $classId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo promoteClass($classId);
    }
}

// Update class
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "updateClass") {
        $classId = $_POST["classId"];
        $course = $_POST["course"];
        $department = $_POST["department"];
        $semester = $_POST["semester"];
        $endingYear = $_POST["endingYear"];
        $startingYear = $_POST["startingYear"];
        function updateClass($classId, $course, $department, $semester, $endingYear, $startingYear)
        {
            global $conn;
            // update class
            $sql = "UPDATE `erp_class` SET `startingYear` = '$startingYear', `endingYear` = '$endingYear', `semester` = '$semester', `department` = '$department', `course` = '$course' WHERE `erp_class`.`classId` = $classId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo updateClass($classId, $course, $department, $semester, $endingYear, $startingYear);
    }
}

// Delete class
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "deleteClass") {
        $classId = $_POST["classId"];
        function deleteClass($classId)
        {
            global $conn;
            $sql = "DELETE FROM erp_class WHERE `erp_class`.`classId` = $classId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo deleteClass($classId);
    }
}
// Create a filtered table for Attendance report
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "filterAttendanceTable") {
        $classId = $_POST["classId"];
        $fromDate = $_POST["fromDate"];
        $toDate = $_POST["toDate"];
        $days = $_POST["days"];

        function filterAttendanceTable($classId, $fromDate, $toDate, $days)
        {
            global $conn;
            // Get students with attendance record
            $sql = "SELECT DISTINCT studentId FROM erp_attendance WHERE classId = $classId";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $studentIds = array();
                $studentsWithAttendance = array();
                while ($row = $result->fetch_assoc()) {
                    $studentIds[] = $row;
                }
                foreach ($studentIds as $studentId) {
                    $sql = "SELECT * FROM erp_login WHERE user_id = $studentId[studentId]";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            $studentsWithAttendance[] = $row;
                        }
                    }
                }
            }
            $i = 1;
            // Get last 7 days for CSE students attendance record
            foreach ($studentsWithAttendance as $studentWithAttendance) {
                $sql = "SELECT * FROM `erp_attendance` WHERE studentId = $studentWithAttendance[user_id] AND date BETWEEN '$fromDate' AND '$toDate'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $attendanceRecords = array();
                    while ($row = $result->fetch_assoc()) {
                        $attendanceRecords[] = $row['status'];
                    }
                    $noOfPresentAndAbsent = array();
                    $noOfPresentAndAbsent[] = array_count_values($attendanceRecords);
                    $noOfPresent = (int)$noOfPresentAndAbsent[0][1];

                    // Get all of the past days for CSE students attendance record
                    $sql = "SELECT * FROM erp_attendance WHERE studentId = $studentWithAttendance[user_id];";
                    $result = mysqli_query($conn, $sql);
                    $overallAttendanceRecords = array();
                    while ($row = $result->fetch_assoc()) {
                        $overallAttendanceRecords[] = $row['status'];
                    }
                    $overallNoOfPresentAndAbsent = array();
                    $overallNoOfPresentAndAbsent[] = array_count_values($overallAttendanceRecords);
                    $overallNoOfPresent = (int) $overallNoOfPresentAndAbsent[0][1];
?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $studentWithAttendance['f_name'] . ' ' . $studentWithAttendance['l_name'] ?></td>
                        <td><?php echo ($days * 5) ?></td>
                        <td><?php echo ($noOfPresent) ?></td>
                        <td><?php echo round(($noOfPresent / ($days * 5)) * 100) . '%' ?></td>
                        <td>125</td>
                        <td><?php echo ($overallNoOfPresent) ?></td>
                        <td><?php echo round(($overallNoOfPresent / 125) * 100) . '%' ?></td>
                    </tr>
                <?php $i++;
                };
            }
            // close database connection
            mysqli_close($conn);
        }
        filterAttendanceTable($classId, $fromDate, $toDate, $days);
    }
}

// Create Exam
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "createExam") {
        $examName = $_POST["examName"];
        function createExam($examName)
        {
            global $conn;
            $sql = "INSERT INTO `erp_exam` (`examId`, `examName`) VALUES ('', '$examName')";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo createExam($examName);
    }
}

// Update grade
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "updateGrade") {
        $gradeId = $_POST["gradeId"];
        $studentMark = $_POST["studentMark"];
        function updateGrade($gradeId, $studentMark)
        {
            global $conn;
            $sql = "UPDATE `erp_grade` SET `mark` = '$studentMark' WHERE `erp_grade`.`gradeId` = $gradeId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }
        echo updateGrade($gradeId, $studentMark);
    }
}

// Filter manage grade page
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "filterManageClassPage") {
        $classId = $_POST["classId"];
        $semester = $_POST["semester"];
        $examName = $_POST["examName"];
        function filterManageClassPage($classId, $semester, $examName)
        {
            global $conn;
            // $sql = "SELECT * FROM `erp_grade` WHERE semester =$semester AND studentId= AND examName= 'IAT1';";
            // Getting student IDs with selected class from filter
            $sql = "SELECT * FROM erp_login WHERE classId =$classId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            $studentIds = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $studentIds[] = $row['user_id'];
                }
            }
            $filteredGradeRecords = array();
            foreach ($studentIds as $studentId) {
                $sql = "SELECT * FROM `erp_grade` WHERE semester=$semester AND studentId=$studentId AND examName='$examName'";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $filteredGradeRecords[] = $row;
                    }
                }
            }
            foreach ($filteredGradeRecords as $grade) {
                ?>
                <tr>
                            <td><?php echo $grade['examName'] ?></td>
                            <td><?php echo $grade['subjectCode'] ?></td>
                            <td><?php echo $grade['subjectName'] ?></td>
                            <td><?php echo $grade['studentId'] ?></td>
                            <td><?php echo $grade['studentName'] ?></td>
                            <td><?php echo $grade['mark'] ?></td>
                            <td>
                                <button type='button' rowData="[<?php echo $grade['gradeId'] . ',' . $grade['studentName'] . ',' . $grade['mark'] ?>]" class='btn btn-primary editBtn' data-bs-toggle='modal' data-bs-target='#editModal'>
                                    Edit
                                </button>
                            </td>
                            <td>
                                <button type="button" gradeId="<?php echo $grade['gradeId'] ?>" class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
<?php }
            // close database connection
            mysqli_close($conn);
            return "|OK";
        }
        echo filterManageClassPage($classId, $semester, $examName);
    }
}
?>