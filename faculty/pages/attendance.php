<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Header.php');
include('../includes/Menu.php');

// Attendance data for marking structure
$today = strtolower(date('l'));
// $today = 'friday'; 
$date = date('Y-m-d');
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
?>

<div class="iq-navbar-header" style="height: 215px;">

    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Mark attendance</h1>
                        <p>Students attendance can be marked here.</p>
                    </div>
                    <!-- Button on the header -->
                    <!-- <div>
                        <a href="" class="btn btn-link btn-soft-light">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                            </svg>
                            Announcements
                        </a>
                    </div> -->
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

<!-- Create a Subject form -->
<div class="form-group m-4">
    <label class="form-label" for="department">Date:</label>
    <input class="form-control" type="date" id="date" style="width:15%" value="<?php echo date('Y-m-d') ?>">
</div>
<div id="attendanceMainSection">
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
                            $sql = "SELECT * FROM erp_timetable WHERE classId=$subjectClassId AND day='$today' AND subjectCode='$subjectRow[subjectCode]'";
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
</div>

<script>
    $(document).ready(function() {
        function accordionClickListener() {
            $(".presenceCheckbox").click(function(e) {
                var isPresent = $(this).attr('present') == 1 ? '1' : '0';
                var classId = $(this).attr('classId');
                var day = $(this).attr('day');
                var date = $("#date").val();
                var staffId = $(this).attr('staffId');
                var studentId = $(this).attr('studentId');
                var subjectCode = $(this).attr('subjectCode');
                var period = $(this).attr('period');
                console.log(`ClassID: ${classId} day: ${day} staffId: ${staffId} studentId: ${studentId} subjectCode: ${subjectCode} present: ${isPresent}`);

                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        isPresent: isPresent,
                        classId: classId,
                        day: day,
                        date: date,
                        staffId: staffId,
                        studentId: studentId,
                        subjectCode: subjectCode,
                        period: period,
                        Function: "markAttendance",
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Successfully Created! </div>`);
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
        }
        accordionClickListener();



        $("#date").change(function(e) {
            var date = $("#date").val();
            var user_id = <?php echo $user_id ?>;
            console.log(date);

            $.ajax({
                url: '../functions.php',
                type: 'POST',
                data: {
                    date: date,
                    user_id: user_id,
                    Function: "markAttendanceTableUponDateChange",
                },
                success: function(response) {
                    response = response.split('|');
                    var attendanceAccordionContent = response[0];
                    var responseMsg = response[1];
                    console.log(response);
                    if (responseMsg == "OK") {
                        console.log("done");
                        $("#attendanceMainSection").html(attendanceAccordionContent);
                        accordionClickListener();
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