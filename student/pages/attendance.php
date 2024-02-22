<?php
include( $_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Header.php');
include('../includes/Menu.php');

// Get classes
$year = date("Y");
$sql = "SELECT * FROM erp_class";
$result = mysqli_query($conn, $sql);
if ($result) {
    $classes = array();
    while ($row = $result->fetch_assoc()) {
        $classes[] = $row;
    }
}

// Get students with attendance record
$sql = "SELECT DISTINCT studentId FROM erp_attendance WHERE classId = 13";
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

?>

<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <?php
                        // print_r($studentsWithAttendance); 
                        ?>
                        <h1>Report Attendance</h1>
                        <p>You can track your attendance records of your current course.</p>
                    </div>
                    <div>
                        <a href="" class="btn btn-link btn-soft-light">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                            </svg>
                            Announcements
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="iq-header-img">
        <img src="../../assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
        <img src="../../assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
        <img src="../../assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
        <img src="../../assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
        <img src="../../assets/image    s/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
        <img src="../../assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
    </div>
</div> <!-- Nav Header Component End -->
<!--Nav End-->
</div>
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title" id="heading"> Your last 7 days attendance </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Total Hours</th>
                                    <th>Attended Hours</th>
                                    <th>Attendance %</th>
                                    <th>Overall Hours</th>
                                    <th>Overall Att. Hours</th>
                                    <th>Overall Att. %</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Get last 7 days for CSE students attendance record
                                $sql = "SELECT * FROM erp_attendance WHERE studentId = $user_id AND date > CURDATE() - INTERVAL 7 DAY;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $attendanceRecords = array();
                                    while ($row = $result->fetch_assoc()) {
                                        $attendanceRecords[] = $row['status'];
                                    }
                                    $noOfPresentAndAbsent = array();
                                    $noOfPresentAndAbsent[] = array_count_values($attendanceRecords);
                                    $noOfPresent = $noOfPresentAndAbsent[0][1];

                                    // Get all of the past days for CSE students attendance record
                                    $sql = "SELECT * FROM erp_attendance WHERE studentId = $user_id;";
                                    $result = mysqli_query($conn, $sql);
                                    $overallAttendanceRecords = array();
                                    while ($row = $result->fetch_assoc()) {
                                        $overallAttendanceRecords[] = $row['status'];
                                    }
                                    $overallNoOfPresentAndAbsent = array();
                                    $overallNoOfPresentAndAbsent[] = array_count_values($overallAttendanceRecords);
                                    $overallNoOfPresent = $overallNoOfPresentAndAbsent[0][1];

                                ?>
                                <tr>
                                    <td><?php echo $f_fname . ' ' . $f_lname ?></td>
                                    <td>25</td>
                                    <td><?php echo ($noOfPresent) ?></td>
                                    <td><?php echo ($noOfPresent / 25) * 100 . '%' ?></td>
                                    <td>125</td>
                                    <td><?php echo ($overallNoOfPresent) ?></td>
                                    <td><?php echo ($overallNoOfPresent / 125) * 100 . '%' ?></td>
                                </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="reportTableRowsForm" action="pdf.php" method="POST">
        <input id="reportTableRows" classNameAndInfo="" name='reportTableRows' type="text" hidden value="">
    </form>
    <div class="btn-download">
        <a id="downloadBtn" class="btn btn-success px-3 py-2">
            <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.4" d="M17.554 7.29614C20.005 7.29614 22 9.35594 22 11.8876V16.9199C22 19.4453 20.01 21.5 17.564 21.5L6.448 21.5C3.996 21.5 2 19.4412 2 16.9096V11.8773C2 9.35181 3.991 7.29614 6.438 7.29614H7.378L17.554 7.29614Z" fill="currentColor"></path>
                <path d="M12.5464 16.0374L15.4554 13.0695C15.7554 12.7627 15.7554 12.2691 15.4534 11.9634C15.1514 11.6587 14.6644 11.6597 14.3644 11.9654L12.7714 13.5905L12.7714 3.2821C12.7714 2.85042 12.4264 2.5 12.0004 2.5C11.5754 2.5 11.2314 2.85042 11.2314 3.2821L11.2314 13.5905L9.63742 11.9654C9.33742 11.6597 8.85043 11.6587 8.54843 11.9634C8.39743 12.1168 8.32142 12.3168 8.32142 12.518C8.32142 12.717 8.39743 12.9171 8.54643 13.0695L11.4554 16.0374C11.6004 16.1847 11.7964 16.268 12.0004 16.268C12.2054 16.268 12.4014 16.1847 12.5464 16.0374Z" fill="currentColor"></path>
            </svg>
        </a>
    </div>

    <!-- Modal for filtering -->
    <div class="modal fade" id="filterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Filter attendance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="classId">Class: </label>
                        <select id="classId" name="type" class="selectpicker form-control" data-style="py-0">
                            <option hidden disabled selected value>Choose class</option>
                            <?php foreach ($classes as $class) { ?>
                                <option value="<?php echo $class['classId'] . ',' . $class['course'] . ' - ' . $class['department'] . ' - Sem ' . $class['semester'] ?> "><?php echo $class['course'] . ' - ' . $class['department'] . ' - Sem ' . $class['semester'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text" class="form-label">From date</label>
                        <input type="date" class="form-control" id="fromDate" aria-describedby="text" placeholder="From Date">
                    </div>
                    <div class="form-group">
                        <label for="text" class="form-label">To date</label>
                        <input type="date" class="form-control" id="toDate" aria-describedby="text" placeholder="To Date">
                    </div>
                    <div class="text-start mt-2">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="saveFilterBtn">Save</button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
                <div id="result2"></div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            var initialHeading = $('#heading').html();
            $('#reportTableRows').val(initialHeading);
            $('#saveFilterBtn').click(function(e) {
                e.preventDefault();
                var classIdAndClassNameArray = $('#classId').val();
                var classIdAndClassNameArray = classIdAndClassNameArray.split(',');
                var classId = classIdAndClassNameArray[0];
                var className = classIdAndClassNameArray[1];
                var fromDate = $('#fromDate').val();
                var toDate = $('#toDate').val();
                console.log(`classId: ${classId} fromDate: ${fromDate} toDate: ${toDate}`);
                var date1 = new Date(toDate);
                var date2 = new Date(fromDate);
                let Difference_In_Time =
                    date1.getTime() - date2.getTime();
                let Difference_In_Days =
                    Math.round(Difference_In_Time / (1000 * 3600 * 24));
                var days = Difference_In_Days + 1;
                $('#heading').html(`${days} days attendance record from ${fromDate} to ${toDate} for ${className}`);
                var classNameAndInfo = `${days} days attendance record from ${fromDate} to ${toDate} for ${className}`;
                $('#reportTableRows').val(classNameAndInfo);

                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        classId: classId,
                        fromDate: fromDate,
                        toDate: toDate,
                        days: days,
                        Function: "filterAttendanceTable",
                    },
                    success: function(response) {
                        console.log(response);
                        var rows = response;
                        $('tbody').html(rows);
                    }

                })
            });

            $('#downloadBtn').click(function(e) {
                var tableRows = $('tbody').html();
                var classNameAndInfo = $('#reportTableRows').val();
                $('#reportTableRows').val(`${tableRows},${classNameAndInfo}`);
                console.log(classNameAndInfo);
                $('#reportTableRowsForm').submit();
            })

        })
    </script>


    <?php
  include($_SERVER['DOCUMENT_ROOT'] .'/Intern1/Includes/Footer.php');

    ?>