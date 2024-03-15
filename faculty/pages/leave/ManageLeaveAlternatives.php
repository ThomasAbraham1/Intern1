<?php


include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/faculty/includes/Menu.php');
$log_id = $user_id;
// $classIds = $_SESSION['classIds'];
?>


<?php
if (isset($_GET["LeaveId"])) {
    $LeaveId = $_GET["LeaveId"];
}
if (isset($_GET["leaveStartingDate"])) {
    $leaveStartingDate = $_GET["leaveStartingDate"];
}
if (isset($_GET["leaveEndingDate"])) {
    $leaveEndingDate = $_GET["leaveEndingDate"];
}

// For the table

$sql = "SELECT erp_leave_alt.f_id,erp_leave_alt.la_id, erp_leave_alt.la_date, erp_leave_alt.la_hour, la_principalacpt,la_hodacpt, la_staffacpt, erp_leave_alt.cls_id FROM `erp_leave_alt` JOIN erp_login on erp_leave_alt.f_id=erp_login.user_id WHERE erp_leave_alt.lv_id=" . $LeaveId . "";
$result = mysqli_query($conn, $sql);
$alterationTableRows = array();
while ($row = mysqli_fetch_assoc($result)) {

    array_push($alterationTableRows, $row);
}

$timestamp = strtotime($leaveStartingDate);
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






// // Code from trial.php
// // Getting subjects of faculty
// $subjects = [];
// $cse_classids = [];
// $periods = [];
// $sql = "SELECT f_id, tt_subcode FROM erp_subject WHERE f_id = '$log_id'";
// $result = $conn->query($sql);


// // Check if any rows were returned
// if ($result->num_rows > 0) {

//     // Output the table header
//     // Output the table rows
//     $i = 0;
//     foreach ($result as $row) {

//         $subjects[$i] = $row['tt_subcode'];
//         $i++;
//     }
//     // Output the table footer

// } else {
//     echo "0 results";
// }

// $query = "SELECT tt_day, tt_period, tt_subcode FROM erp_timetable WHERE tt_day='Mon' AND (";
// foreach ($subjects as $subject) {
//     $q = $query . "tt_subcode='$subject' OR ";
//     $query = $q;
// }
// $query = rtrim($query, " OR "); // Remove the last " OR "
// $query .= ")";

// // Execute the query and fetch the results
// $result = $conn->query($query);

// // Check if any rows were returned
// if ($result->num_rows > 0) {

//     $i = 0;
//     // Output the table header

//     // Output the table rows
//     $i = 0;
//     while ($row = $result->fetch_assoc()) {
//         $todaySubjects[$i] = $row['tt_subcode'];
//         $periods[$i] = $row['tt_period'];
//         $i++;
//     }
//     $todaySubjects = array_unique($todaySubjects);
//     // Output the table footer  
// } else {
//     echo "0 results";
// }


// // $sql = "SELECT DISTINCT cls_deptname, cls_id FROM erp_class WHERE cls_deptname ='Computer Science And Engineering' ";
// // $result = $conn->query($sql);
// // if ($result->num_rows > 0) {
// //     $i = 0;
// //     while ($row = $result->fetch_assoc()) {
// //         $cse_classids[$i] = $row['cls_id'];
// //         $i++;
// //     }
// // }
// // echo print_r($cse_classids);
// foreach ($classIds as $classId) {
//     array_push($cse_classids, $classId['cls_id']);
// }

// foreach ($periods as $period) {
//     // Build the query string
//     // $query = "SELECT * FROM erp_subject INNER JOIN erp_timetable ON erp_subject.tt_subcode = erp_timetable.tt_subcode WHERE tt_day='Mon' AND tt_period NOT IN (";
//     // foreach ($periods as $period) {
//     //   $query .= "$period, ";
//     // }

//     $query = "SELECT * FROM erp_subject INNER JOIN erp_timetable ON erp_subject.tt_subcode = erp_timetable.tt_subcode INNER JOIN erp_faculty ON erp_subject.f_id=erp_faculty.f_id WHERE tt_day='Mon' AND tt_period NOT IN ($period) AND erp_subject.f_id NOT IN ('$log_id') AND erp_subject.cls_id IN (";
//     // $query = rtrim($query, ", "); // Remove the last comma and space

//     // $query .= ")";
//     foreach ($cse_classids as $classid) {
//         $query .= "$classid, ";
//     }
//     $query = rtrim($query, ", ");
//     $query .= ")";
//     // Execute the query and fetch the results
//     $result = $conn->query($query);

//     // Check if any rows were returned
//     if ($result->num_rows > 0) {
//         // Output the table header

//         // Output the table rows
//         while ($row = $result->fetch_assoc()) {
//         }
//         // Output the table footer
//     } else {
//         echo "0 results";
//     }
// }

// //for the class dropdown

// //THIS IS IT
// $sql = "SELECT DISTINCT erp_timetable.cls_id,erp_timetable.tt_subcode, erp_class.cls_id, erp_class.cls_dept, erp_class.cls_sem, erp_class.cls_course FROM `erp_class` INNER JOIN erp_timetable ON erp_class.cls_id = erp_timetable.cls_id WHERE tt_day='Mon' AND tt_period IN (";

// // For adding the periods into query
// foreach ($periods as $period) {
//     $sql .= "$period, ";
// }
// $sql = rtrim($sql, ", ");
// $sql .= ") AND erp_timetable.cls_id IN (";

// // For adding the class ids into the query
// foreach ($cse_classids as $classid) {
//     $sql .= "$classid, ";
// }
// $sql = rtrim($sql, ", ");
// $sql .= ") AND erp_timetable.tt_subcode IN (";
// // For adding the subjects into query
// foreach ($todaySubjects as $todaySubject) {
//     $sql .= "'$todaySubject', ";
// }
// $sql = rtrim($sql, ", ");
// $sql .= ")";

// $result = mysqli_query($conn, $sql);
// $EventRows1 = array();

// while ($row = mysqli_fetch_assoc($result)) {
//     array_push($EventRows1, $row);
// }


$sql = "SELECT erp_class.classId, course, department, semester FROM erp_class INNER JOIN erp_leave_alt ON erp_class.classId = erp_leave_alt.cls_id WHERE lv_id = $LeaveId";
$result = mysqli_query($conn, $sql);
$EventRows2 = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($EventRows2, $row);
}


// $subjects = json_encode($periods);
// mysqli_close($conn);
?>







<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Manage Leave Alternatives</h1>
                        <p>Here you can find all of your Leave Alternatives Details.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="iq-header-img">
        <img src="/intern1/assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
        <img src="/intern1/assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
        <img src="/intern1/assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
        <img src="/intern1/assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
        <img src="/intern1/assets/images/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
        <img src="/intern1/assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
    </div>
</div>
<!-- Nav Header Component End -->
<!--Nav End-->



<div class="conatiner-fluid content-inner mt-n5 py-0">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="form-group m-4">
                    <label class="form-label" for="department">Leave Date:</label>
                    <input class="form-control" type="date" id="date" min="<?php echo $leaveStartingDate ?>" max="<?php echo $leaveEndingDate ?>" style="width:15%; position:absolute; float:left" value="<?php echo $leaveStartingDate ?>">
                </div>
                <div id="tableBody">
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
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>alteration date</th>
                                    <th>alteration hour</th>
                                    <th>alteration class</th>
                                    <th>aleration staff</th>
                                    <th>staff accept</th>
                                    <th>admin accept</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($alterationTableRows as $TableRow) {
                                    $staffaccept = $TableRow['la_staffacpt'] == 0 ? "false" : "true";
                                    $hodaccept = $TableRow['la_hodacpt'] == 0 ? "false" : "true";
                                    $principalaccept = $TableRow['la_principalacpt'] == 0 ? "false" : "true";
                                    $staffName = "";
                                    foreach ($EventRows as $row) {
                                        if ($row['user_id'] == $TableRow['f_id'])
                                            $staffName = "$row[f_name] $row[l_name]";
                                    }
                                    $ClassName = "";
                                    foreach ($EventRows2 as $row) {
                                        if ($row['classId'] == $TableRow['cls_id'])
                                            $ClassName = "$row[course]-$row[department]-Sem-$row[semester]";
                                    }
                                    echo "<a href ='../Leave/ManageLeaveAlternatives.php'><tr>
                                        <td>$TableRow[la_date]</td>
                                        <td>$TableRow[la_hour]</td>
                                        <td>$ClassName</td>
                                        <td>$staffName</td>
                                        <td>$staffaccept</td>
                                        <td>$principalaccept</td>
                                        <td><input class='altRecordDelCheckBox' type='checkbox' name='leave_approval' value='$TableRow[la_id]'></td> 
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="Result" class="m-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// $cse_classids = json_encode($cse_classids);
// $periods = json_encode($periods);
// $todaySubjects = json_encode($todaySubjects);

?>


<script>
    $(document).ready(function() {
        // Define selectedPeriod variable and set initial value to default option value


        // Listen for the "change" event on the "AlterationHour" dropdown menu
        function AlterationHourEventListener() {
            $('#AlterationHour').on('change', function() {
                var period = $("#AlterationHour").val();
                var staffId = <?php echo $user_id ?>;
                console.log(staffId);
                $.ajax({
                    url: '../../functions.php',
                    type: 'POST',
                    data: {
                        period: period,
                        staffId: staffId,
                        Function: "AleternationHourDropdownChange"
                    },
                    success: function(response) {
                        response = JSON.parse(response);
                        console.log(response);
                        if (response[0] == "OK") {
                            console.log("Success");
                            $("#AlterationClass").append(response[1]);

                        } else {

                            // $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                            // setTimeout(function () {
                            //     $("#Result").html('');
                            // }, 5000);

                        }

                    }
                });

            });
        }
        AlterationHourEventListener();

        function CreateLeaveAlternativeBtnEventListener() {
            $("#CreateLeaveAlternativeBtn").click(function() {
                var AlterationHour = $("#AlterationHour").val();
                var AlterationClass = $("#AlterationClass").val();
                var AlerationStaff = $("#AlerationStaff").val();
                var LeaveId = $("#LeaveId").val();
                var date = $("#date").val();

                console.log(AlterationHour + AlterationClass + AlerationStaff + LeaveId + '..'+ date);

                $.ajax({
                    url: '../../functions.php',
                    type: 'POST',
                    data: {
                        AlterationHour: AlterationHour,
                        AlterationClass: AlterationClass,
                        AlerationStaff: AlerationStaff,
                        LeaveId: LeaveId,
                        date: date,
                        Function: "CreateLeaveAlternatives"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Event Created Successfully</div>`);
                            setTimeout(function() {
                                $("#Result").html('');
                                $('#CreateLeaveAlternative').modal('hide');
                                location.reload();
                            }, 1000);
                        } else {
                            $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                            setTimeout(function() {
                                $("#Result").html('');
                            }, 1000);

                        }

                    }
                });

            });
        };
        CreateLeaveAlternativeBtnEventListener();
        // Ajax for deleting the alt records if a wrong alteration has been made

        $(function() {
            $(".altRecordDelCheckBox").click(function(e) {
                if (confirm("Are you sure you want to consent?") == true) {
                    var la_id = $(this).val();
                    $.ajax({
                        url: '../../functions.php',
                        type: 'POST',
                        data: {
                            la_id: la_id,
                            Function: "altRecordDeletion"
                        },
                        success: function(response) {
                            console.log(response);
                            if (response == "OK") {
                                $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Successfully Deleted Alterantive Record!</div>`);
                                setTimeout(function() {
                                    $("#Result").html('');
                                    $('#CreateLeaveAlternative').modal('hide');
                                    location.reload();
                                }, 2000);
                            } else {
                                $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                                setTimeout(function() {
                                    $("#Result").html('');
                                }, 2000);

                            }

                        }
                    })
                } else {
                    $(this).prop('checked', false) // In-case the user chooses to cancel confirmation for ticking checkbox  
                }
            });
        });

        $("#date").change(function(e) {
            var date = $("#date").val();
            var user_id = <?php echo $user_id ?>;
            var leaveId = <?php echo $LeaveId ?>;
            console.log(date);

            $.ajax({
                url: '../../functions.php',
                type: 'POST',
                data: {
                    date: date,
                    user_id: user_id,
                    leaveId: leaveId,
                    Function: "createLeaveAlterationForDifferentDates",
                },
                success: function(response) {
                    response = response.split('|');
                    var attendanceAccordionContent = response[0];
                    var responseMsg = response[1];
                    console.log(response);
                    if (responseMsg == "OK") {
                        console.log("done");
                        $("#tableBody").html(attendanceAccordionContent);
                        CreateLeaveAlternativeBtnEventListener();
                        AlterationHourEventListener()
                        // $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Successfully Created! </div>`);
                        // window.location.href = "home.php";
                    } else {
                        $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                    }
                    // setTimeout(function() {
                    //     $("#Result").html('');
                    //     window.location.reload();
                    // }, 1000);
                }
            });
        });
    });
</script>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Footer.php');
?>


<!-- SELECT subjectId,erp_timetable.subjectCode,subjectName, staffId,erp_timetable.classId,timetableId,day,period,startingYear,endingYear,semester,department,course FROM erp_subject INNER JOIN erp_timetable ON erp_subject.subjectCode = erp_timetable.subjectCode INNER JOIN erp_class ON erp_class.classId=erp_timetable.classId WHERE erp_subject.staffId = 8 AND day='Monday'; -->


<!-- select * FROM erp_timetable INNER JOIN erp_subject ON erp_subject.subjectCode = erp_timetable.subjectCode WHERE erp_timetable.classId IN (SELECT erp_timetable.classId FROM erp_subject INNER JOIN erp_timetable ON erp_subject.subjectCode = erp_timetable.subjectCode INNER JOIN erp_class ON erp_class.classId=erp_timetable.classId WHERE erp_subject.staffId = 8 AND day='Wednesday') AND period NOT IN (SELECT period FROM erp_subject INNER JOIN erp_timetable ON erp_subject.subjectCode = erp_timetable.subjectCode INNER JOIN erp_class ON erp_class.classId=erp_timetable.classId WHERE erp_subject.staffId = 8 AND day='Wednesday') AND day="Wednesday"; -->