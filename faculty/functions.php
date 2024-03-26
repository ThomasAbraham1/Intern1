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
            if (!password_verify($confirmPassword, $password)) return "Passwords do not match!";
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
            $date = $_POST["date"];
            $period = $_POST["period"];
            $classId = $_POST["classId"];
            $isPresent = $_POST["isPresent"];
            function markAttendance($isPresent, $classId, $day, $staffId, $studentId, $subjectCode, $period, $date)
            {
                global $conn;
                // $date = date('Y-m-d');   
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

            echo markAttendance($isPresent, $classId, $day, $staffId, $studentId, $subjectCode, $period, $date);
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
                    <td><?php echo $student['f_name'] . ' ' . $student['l_name'] ?></td>
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
        $examName = $_POST["examName"];
        $subjectName = $_POST["subjectName"];
        $subjectCode = $_POST["subjectCode"];
        $semester = $_POST["semester"];
        $date = date('Y-m-d');
        function saveGradingSheet($studentMarkData, $subjectName, $subjectCode, $examName, $semester)
        {
            global $conn;
            foreach ($studentMarkData as $studentMarkRecord) {
                $sql = "INSERT INTO `erp_grade` (`gradeId`, `subjectCode`, `subjectName`,`studentId`, `studentName`,`semester`, `examName`, `mark`,`date`) VALUES (NULL, '$subjectCode', '$subjectName','$studentMarkRecord[studentId]','$studentMarkRecord[studentName]', $semester, '$examName','$studentMarkRecord[studentMark]', CURRENT_DATE)";
                $result = mysqli_query($conn, $sql);
                if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            }

            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        $sql = "SELECT * FROM `erp_grade` WHERE semester=$semester AND subjectCode='$subjectCode' AND examName='$examName'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo 'Please check the manage page before possibly posting duplicates. Or contact an administrator regarding this issue.';
        } else {
            echo saveGradingSheet($studentMarkData, $subjectName, $subjectCode, $examName, $semester);
        }
        // print_r($studentMarkData);
    }
}



//  LEAVE CODE

if (isset($_POST["Function"])) {

    if ($_POST["Function"] == "CreateLeave") {
        // execute SQL statement
        $StaffId = $_POST["StaffId"];
        $LeaveType = $_POST["LeaveType"];
        $LeaveStartDate = $_POST["LeaveStartDate"];
        $LeaveEndDate = $_POST["LeaveEndDate"];
        $LeaveStartTime = $_POST["LeaveStartTime"];
        $LeaveEndTime = $_POST["LeaveEndTime"];
        $LeaveReason = $_POST["LeaveReason"];

        $sql = "SELECT department FROM `erp_login`WHERE user_id='$StaffId';";
        $result = mysqli_query($conn, $sql);
        $StaffDept = mysqli_fetch_assoc($result)['department'];

        $sql = "INSERT INTO `erp_leave` (`lv_id`, `f_id`, `f_dept`, `lv_dept`, `lv_type`, `lv_reason`, `lv_applyon`, `lv_sdate`, `lv_edate`, `lv_stime`, `lv_etime`) 
        VALUES (NULL, '$StaffId', '$StaffDept', '', '$LeaveType', '$LeaveReason', NOW(), '$LeaveStartDate', '$LeaveEndDate', '$LeaveStartTime', '$LeaveEndTime');";
        if (mysqli_query($conn, $sql)) {
            echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // close database connection
        mysqli_close($conn);
    }



    if ($_POST["Function"] == "CreateLeaveAlternatives") {
        // execute SQL statement
        $AlterationHour = $_POST["AlterationHour"];
        $AlterationClass = $_POST["AlterationClass"];
        $AlerationStaff = $_POST["AlerationStaff"];
        $LeaveId = $_POST["LeaveId"];
        $date = $_POST["date"];


        $sql = "INSERT INTO `erp_leave_alt` (`la_id`, `lv_id`, `la_date`, `la_hour`, `cls_id`, `f_id`, `la_staffacpt`, `la_hodacpt`, `la_principalacpt`) VALUES (NULL, '$LeaveId', '$date', '$AlterationHour', '$AlterationClass','$AlerationStaff' , 0, 0, 0);";
        if (mysqli_query($conn, $sql)) {
            echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // close database connection
        mysqli_close($conn);
    }


    if ($_POST["Function"] == "ApproveLeaveId") {
        // execute SQL statement
        $LeaveId = $_POST["LeaveId"];
        $LeaveVal = $_POST["LeaveVal"];
        $Approval = $_POST["Approval"];
        $role = $_POST["role"];
        $altStaffEmail = $_POST["altStaffEmail"];
        $approverEmail = $_POST["approverEmail"];
        $okayMsg = '';

        if ($Approval == 'Approved') {
            $sql = "UPDATE `erp_leave_alt` SET la_" . $role . "acpt = '$LeaveVal' WHERE `erp_leave_alt`.`lv_id` = $LeaveId;";
            if (mysqli_query($conn, $sql)) {
                $okayMsg = 'OK';
            } else {
                $okayMsg .= "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else if ($Approval == 'Denied') {
            $sql = "DELETE FROM erp_leave_alt WHERE lv_id= $LeaveId";
            if (mysqli_query($conn, $sql)) {
                $okayMsg = 'OK';
            } else {
                $okayMsg .= "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }


        // Email Snippet Starts

        //Load Composer's autoloader
        require 'vendor/autoload.php';
        //Create an instance; passing `true` enables exceptions
        // $mail = new PHPMailer(true);
        // try {
        //     //Server settings
        //     $mail->isSMTP();                                            //Send using SMTP
        //     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        //     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //     $mail->Username   = 'cta102938@gmail.com';                     //SMTP username
        //     $mail->Password   = 'btkovkokiqsiwyod';                               //SMTP password
        //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        //     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //     //Recipients
        //     $mail->setFrom('cta102938@gmail.com', 'Grace LR Bot');
        //     $mail->addAddress($altStaffEmail, 'Staff');     //Add a recipient
        //     // $mail->addReplyTo('info@example.com', 'Information');
        //     //Attachments
        //     // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        //     //Content
        //     $mail->isHTML(true);                                  //Set email format to HTML
        //     $mail->Subject = '['. $role. '] Leave Request has been "' . $Approval . '".';
        //     $mail->Body    = ' -';
        //     $mail->AltBody = ' -';
        //     $mail->send();
        //     $emailResult = 'and a notification message has been sent';
        // } catch (Exception $e) {
        //     $emailResult = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // }

        // Email snippet ends

        $responseArray = [];
        array_push($responseArray, $okayMsg);
        array_push($responseArray, $emailResult);
        $responseArray = json_encode($responseArray);

        echo $responseArray;

        // close database connection
        mysqli_close($conn);
    }



    if ($_POST["Function"] == "AleternationHourDropdownChange") {
        // execute SQL statement
        $period = $_POST["period"];
        $staffId = $_POST["staffId"];
        $date = $_POST["date"];
        $timestamp = strtotime($date);
        $day = date('l', $timestamp);


        $sql = "SELECT erp_subject.classId,department,course,semester FROM erp_subject INNER JOIN erp_timetable ON erp_subject.subjectCode = erp_timetable.subjectCode INNER JOIN erp_class ON erp_class.classId=erp_timetable.classId WHERE erp_subject.staffId = $staffId AND day='$day' AND period=$period;";
        $result = $conn->query($sql);
        $TableRows = array();
        if (mysqli_num_rows($result) > 0) {
            $TableRows[] = 'OK';
            // Process the result set
            while ($row = mysqli_fetch_assoc($result)) {
                // Do something with each row
                $classInfo  =  "<option value=" . $row['classId'] . " selected>" . $row['course'] . "-" . $row['department'] . "-Sem-" . $row['semester'] . "</option>";
                $TableRows[] = $classInfo;
            }

            echo (json_encode($TableRows));

            // close database connection
            mysqli_close($conn);
        }
    }


    if ($_POST["Function"] == "leaveReqUpdation") {
        $lvidValue = $_POST["lvidValue"];
        $sql = "UPDATE `erp_leave_alt` SET `la_staffacpt` = '1' WHERE la_id = $lvidValue;";
        if (mysqli_query($conn, $sql)) {
            echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // close database connection
        mysqli_close($conn);
    }

    // Manage Leave Alternative Page's delete operation
    if ($_POST["Function"] == "altRecordDeletion") {
        $la_id = $_POST["la_id"];
        $sql = "DELETE FROM `erp_leave_alt` WHERE la_id = $la_id";
        if (mysqli_query($conn, $sql)) {
            echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    if ($_POST["Function"] == "toHodBtnClick") {
        $laIds = $_POST["laIds"];
        $laIds = json_decode($laIds);
        // Creating a tuple of the La Ids to be used in the query
        $laIdsStringTuple = "(";
        foreach ($laIds as $laId) {
            $laIdsStringTuple .= "$laId,";
        }
        $laIdsStringTuple = rtrim($laIdsStringTuple, ", ");
        $laIdsStringTuple .= ")";
        $sql = "UPDATE erp_leave_alt SET la_staffacpt = 2 WHERE la_id IN $laIdsStringTuple";
        if (mysqli_query($conn, $sql)) {
            echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // close database connection
        mysqli_close($conn);
    }
} else {
    echo "Function Parameter Not set";
}

// Mark Attendance for a different date
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "markAttendanceTableUponDateChange") {
        $date = $_POST["date"];
        $user_id = $_POST["user_id"];
        function markAttendanceTableUponDateChange($date, $user_id)
        {
            global $conn;
            $day = strtotime($date);
            $day = date('l', $day);
            $day = strtolower($day);
            $sql = "SELECT * FROM `erp_subject` WHERE staffId = $user_id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $subjectRows = array();
                $subjectCodes = array();
                $subjectNames = array();
                $subjectClassIds = array();
                while ($row = $result->fetch_assoc()) {
                    $subjectRows[] = $row;
                    $subjectCodes[] = $row['subjectCode'];
                    $subjectNames[] = $row['subjectName'];
                    $subjectClassIds[] = $row['classId'];
                }
            }


            // The table part
            ?>

            <?php
            $i = 0;
            $r = 0;
            $subjectClassIds = array_unique($subjectClassIds); // Number of subjects in total a staff handles
            // print_r($subjectClassIds);
            foreach ($subjectClassIds as $subjectClassId) {
            ?>


                <div class="card m-3 w-100 text ">
                    <div class="card-header">
                        <?php
                        $sql = "SELECT * FROM erp_class WHERE classId = $subjectClassId";
                        $result = mysqli_query($conn, $sql);
                        $rows = array();
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['course'] . ' - ' . $row['department'] . ' - Sem ' . $row['semester'];
                            }
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <div class="bd-example">
                            <?php
                            foreach ($subjectRows as $subjectRow) {
                                if ($subjectRow['classId'] == $subjectClassId) {
                                    // Today's timetable
                                    $sql = "SELECT * FROM erp_timetable WHERE classId=$subjectClassId AND day='$day' AND subjectCode='$subjectRow[subjectCode]'";
                                    $result = mysqli_query($conn, $sql);
                                    $classTimetable = array();
                                    while ($row = $result->fetch_assoc()) {
                                        $classTimetable[] = $row;
                                    }
                                    // print_r($classTimetable);
                                    echo "You have " . count($classTimetable) . ' periods for ' . $subjectRow['subjectCode'] . ' - ' . $subjectRow['subjectName'] . "<br />";
                                    // Skip if the there is no timetable for a subject, therefore skipping a accordion
                                    $noOfPeriods = count($classTimetable);
                                    if ($noOfPeriods == 0) {
                                        continue;
                                    }

                            ?>
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h4 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
                                                    <?php
                                                    echo $subjectRow['subjectCode'] . ' - ' . $subjectRow['subjectName'];
                                                    ?>
                                                </button>
                                            </h4>
                                            <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?php foreach ($classTimetable as $period) {
                                                    ?>
                                                        <div class="card-body p-0">
                                                            <b>Period: <?php echo $period['period'] ?></b>
                                                            <div class="table-responsive mt-4">
                                                                <table id="basic-table" style="text-align:center" class="table table-striped mb-0" role="grid">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Student ID</th>
                                                                            <th>Student Name</th>
                                                                            <th>Presence</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $sql = "SELECT * FROM erp_login WHERE role='student' AND classId = $subjectClassId";
                                                                        $studentsArray = array();
                                                                        $result = mysqli_query($conn, $sql);
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            $studentsArray[] = $row;
                                                                        }
                                                                        ?>
                                                                        <?php foreach ($studentsArray as $student) {
                                                                            $sql = "SELECT * FROM `erp_attendance` WHERE classId=$period[classId] AND subjectCode='$period[subjectCode]' AND studentId=$student[user_id] AND date='$date' AND period=$period[period];";
                                                                            $result = mysqli_query($conn, $sql);
                                                                            $radioCheckAttendanceData = array();
                                                                            while ($row = $result->fetch_assoc()) {
                                                                                $radioCheckAttendanceData[] = $row;
                                                                            }
                                                                        ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <?php echo $student['user_id'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $student['f_name'] . ' ' . $student['l_name'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input type="radio" period='<?php echo $period['period'] ?>' classId='<?php echo $period['classId'] ?>' subjectCode=<?php echo $period['subjectCode'] ?> day='<?php echo $period['day'] ?>' studentId=<?php echo $student['user_id'] ?> staffId=<?php echo $user_id ?> class="form-check-input presenceCheckbox" name="bsradio<?php echo $r ?>" id="radio1" present="1" <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                if (mysqli_num_rows($result) > 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    $isPresent = $radioCheckAttendanceData[0]['status'] == 1 ? 'checked' : 'nope';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo $isPresent;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?>>
                                                                                        <label for="radio1" class="form-check-label pl-2">Present</label>
                                                                                    </div>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input type="radio" period='<?php echo $period['period'] ?>' classId='<?php echo $period['classId'] ?>' subjectCode=<?php echo $period['subjectCode'] ?> day='<?php echo $period['day'] ?>' studentId=<?php echo $student['user_id'] ?> staffId=<?php echo $user_id ?> class="form-check-input presenceCheckbox" name="bsradio<?php echo $r ?>" id="radio1" absent="" <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                if (mysqli_num_rows($result) > 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    $isPresent = $radioCheckAttendanceData[0]['status'] == 0 ? 'checked' : 'nope';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo $isPresent;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?>>
                                                                                        <label for="radio1" class="form-check-label pl-2">Absent</label>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        <?php
                                                                            $r++;
                                                                        } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $i++;
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        <?php

            // close database connection
            mysqli_close($conn);
            return "|OK";
        }
        echo markAttendanceTableUponDateChange($date, $user_id);
    }
}





// Change alteration modal for different leave dates
if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "createLeaveAlterationForDifferentDates") {
        $date = $_POST["date"];
        $user_id = $_POST["user_id"];
        $LeaveId = $_POST["leaveId"];
        function createLeaveAlterationForDifferentDates($date, $user_id, $LeaveId)
        {
            global $conn;
            // Upper part of Manage Leave alternative page
            // For the table

            $sql = "SELECT erp_leave_alt.f_id,erp_leave_alt.la_id, erp_leave_alt.la_date, erp_leave_alt.la_hour, la_principalacpt,la_hodacpt, la_staffacpt, erp_leave_alt.cls_id FROM `erp_leave_alt` JOIN erp_login on erp_leave_alt.f_id=erp_login.user_id WHERE erp_leave_alt.lv_id=" . $LeaveId . "";
            $result = mysqli_query($conn, $sql);
            $alterationTableRows = array();
            while ($row = mysqli_fetch_assoc($result)) {

                array_push($alterationTableRows, $row);
            }

            $timestamp = strtotime($date);
            $day = date('l', $timestamp);
            // Select all classIds this person has periods in for the day
            $classIdsQuery = "SELECT erp_timetable.classId FROM erp_subject INNER JOIN erp_timetable ON erp_subject.subjectCode = erp_timetable.subjectCode INNER JOIN erp_class ON erp_class.classId=erp_timetable.classId WHERE erp_subject.staffId = $user_id AND day='$day'";
            $result = mysqli_query($conn, $classIdsQuery);
            $todayClassesToGoTo = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $todayClassesToGoTo[] = $row['classId'];
            }
            // See all the periods that he has obligations to
            $periodsQuery = "SELECT period FROM erp_subject INNER JOIN erp_timetable ON erp_subject.subjectCode = erp_timetable.subjectCode INNER JOIN erp_class ON erp_class.classId=erp_timetable.classId WHERE erp_subject.staffId = $user_id AND day='$day'";
            $result = mysqli_query($conn, $periodsQuery);
            $todayPeriodsToBeTaken = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $todayPeriodsToBeTaken[] = $row['period'];
            }


            // Find the alternative subjects
            $sql = "SELECT * FROM erp_timetable INNER JOIN erp_subject ON erp_subject.subjectCode = erp_timetable.subjectCode INNER JOIN erp_login ON erp_login.user_id = erp_subject.staffId WHERE erp_timetable.classId IN ($classIdsQuery) AND period NOT IN ($periodsQuery) AND day='$day';";
            $result = mysqli_query($conn, $sql);
            $alterationStaffs = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($alterationStaffs, $row);
            }


            // All users ( for getting all faculty )
            $sql = 'SELECT * FROM erp_login';
            $result = mysqli_query($conn, $sql);
            $EventRows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($EventRows, $row);
            }



            // The table part
        ?>

            <div class="card-header">
                <div class="header-title d-flex justify-content-end">
                    <!-- <h4 class="card-title">Bootstrap Datatables</h4> -->
                    <button class="btn btn-primary mb-2 " type="button" data-bs-toggle="modal" data-bs-target="#CreateLeaveAlternative"> Create Leave Alternative </button>

                    <!-- Modal -->
                    <div class="modal fade" id="CreateLeaveAlternative" tabindex="-1" aria-labelledby="CreateLeaveAlternativeLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="CreateLeaveAlternativeLabel">Create Leave
                                        Alternative</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <div class="form-group">
                                        <label for="AlterationHour" required="required">Alteration Hour</label>
                                        <select class="form-control" id="AlterationHour" name="AlterationHour" required="required">
                                            <option value="">Select your period</option>
                                            <?php
                                            foreach ($todayPeriodsToBeTaken as $period) {
                                                echo "<option value='$period'>$period</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="AlerationStaff">AlerationStaff</label>
                                        <select class="form-control" id="AlerationStaff" name="AlerationStaff" required="required">

                                            <?php
                                            foreach ($alterationStaffs as $Event) {
                                                echo "<option value=" . $Event['user_id'] . ">" . $Event['f_name'] . " " . $Event['l_name'] . ' - ' . $Event['period'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="AlterationClass">AlterationClass</label>
                                        <select class="form-control" id="AlterationClass" name="AlterationClass" required="required" disabled>
                                            <option value="">Select your class</option>
                                        </select>
                                    </div>

                                    <input type="hidden" value="<?php echo $LeaveId; ?>" id='LeaveId'>

                                    <div id="Result" class="m-3">

                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="CreateLeaveAlternativeBtn">Create</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

<?php

            // close database connection
            mysqli_close($conn);
            return "|OK";
        }
        echo createLeaveAlterationForDifferentDates($date, $user_id, $LeaveId);
    }
}


if (isset($_POST["Function"])) {
    if ($_POST["Function"] == "updatePassword") {
        $newPassword = $_POST["newPassword"];
        $oldPassword = $_POST["oldPassword"];
        $userId = $_POST["userId"];
        function updatePassword($oldPassword, $newPassword, $userId)
        {
            global $conn;
            $sql = "SELECT * FROM erp_login WHERE user_id='$userId'";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $hashedPassword = $row['log_pwd'];
            }
            if (!password_verify($oldPassword, $hashedPassword)) return "Invalid old password";
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE `erp_login` SET `log_pwd` = '$newPassword' WHERE `erp_login`.`user_id` = $userId";
            $result = mysqli_query($conn, $sql);
            if (!$result) return "Error: " . $sql . "<br>" . $conn->error;
            // close database connection
            mysqli_close($conn);
            return "OK";
        }

        echo updatePassword($oldPassword, $newPassword, $userId);
    }
}

?>