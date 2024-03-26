<?php
include( $_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Header.php');
include('../includes/Menu.php');

// Select all subjects from erp_subject

$sql = "SELECT * FROM `erp_subject`";
$result = mysqli_query($conn, $sql);
if ($result) {
    $subjects = array();
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }
}

// Select starting year and semester from erp class
$sql = "SELECT * FROM `erp_class`";
$result = mysqli_query($conn, $sql);
if ($result) {
    $classes = array();
    while ($row = $result->fetch_assoc()) {
        $classes[] = $row;
    }
}
?>

<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Create Timetable</h1>
                        <?php 
                        // echo $root = $_SERVER['DOCUMENT_ROOT'];
                         ?>
                        <p>New Timetable can be created here. Consult with management before creating new Timetable.</p>
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

<form id="createTimetableForm">
    <div class="conatiner-fluid content-inner mt-n5 py-0 mb-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                        <div class="card-header d-flex justify-content-betweenmb-4">
                            <div class="header-title">
                                <div class="form-group">
                                    <label class="form-label" for="department"> Create a timetable for:</label>
                                    <select id="classId" name="type" class="selectpicker form-control" data-style="py-0" required>
                                        <option hidden disabled selected value>Choose a class</option>
                                        <?php foreach ($classes as $class) { ?>
                                            <option value="<?php echo $class['classId'] ?>"><?php echo  $className = $class['department'] . ' - Sem ' . $class['semester'] . ' - ' . $class['startingYear'] . ' batch'; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive mt-4">
                                <table id="basic-table" class="table table-striped mb-0" role="grid">
                                    <thead>
                                        <tr>
                                            <th>Monday</th>
                                            <th>Tuesday</th>
                                            <th>Wednesday </th>
                                            <th>Thursday</th>
                                            <th>Friday</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label class="form-label">Period: <?php echo $i ?></label>
                                                        <select id="" name="type" class="selectpicker form-control w-75 monday" data-style="py-0" required>
                                                            <option hidden disabled selected value>Choose a period</option>
                                                            <?php foreach ($subjects as $subject) {  ?>
                                                                <option value="<?php echo $subject['subjectCode'] ?>"><?php echo $subject['subjectName'] ?> - <?php echo $subject['subjectCode'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label class="form-label">Period: <?php echo $i ?></label>
                                                        <select id="" name="type" class="selectpicker form-control w-75 tuesday" data-style="py-0" required>
                                                            <option hidden disabled selected value>Choose a period</option>
                                                            <?php foreach ($subjects as $subject) {  ?>
                                                                <option value="<?php echo $subject['subjectCode'] ?>"><?php echo $subject['subjectName'] ?> - <?php echo $subject['subjectCode'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label class="form-label">Period: <?php echo $i ?></label>
                                                        <select id="" name="type" class="selectpicker form-control w-75 wednesday" data-style="py-0" required>
                                                            <option hidden disabled selected value>Choose a period</option>
                                                            <?php foreach ($subjects as $subject) {  ?>
                                                                <option value="<?php echo $subject['subjectCode'] ?>"><?php echo $subject['subjectName'] ?> - <?php echo $subject['subjectCode'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label class="form-label">Period: <?php echo $i ?></label>
                                                        <select id="" name="type" class="selectpicker form-control w-75 thursday" data-style="py-0" required>
                                                            <option hidden disabled selected value>Choose a period</option>
                                                            <?php foreach ($subjects as $subject) {  ?>
                                                                <option value="<?php echo $subject['subjectCode'] ?>"><?php echo $subject['subjectName'] ?> - <?php echo $subject['subjectCode'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label class="form-label">Period: <?php echo $i ?></label>
                                                        <select id="" name="type" class="selectpicker form-control w-75 friday" data-style="py-0" required>
                                                            <option hidden disabled selected value>Choose a period</option>
                                                            <?php foreach ($subjects as $subject) {  ?>
                                                                <option value="<?php echo $subject['subjectCode'] ?>"><?php echo $subject['subjectName'] ?> - <?php echo $subject['subjectCode'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group mx-auto ">
                            <button id="createTimetableBtn" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                <div id="Result"></div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function(e) {

        $(function() {
            $('#createTimetableForm').parsley().on('field:validated', function() {
                    var ok = $('.parsley-error').length === 0;
                    $('.bs-callout-info').toggleClass('hidden', !ok);
                    $('.bs-callout-warning').toggleClass('hidden', ok);
                })
                .on('form:submit', function() {
                    return false; // Don't submit form for this demo
                });
        });
        $("#createTimetableBtn").click(function(event) {
            if ($('#createTimetableForm').parsley().isValid()) {
                // event.preventDefault();
                var timeTable = [];
                var mondayPeriods = [];
                var tuesdayPeriods = [];
                var wednesdayPeriods = [];
                var thursdayPeriods = [];
                var fridayPeriods = [];

                var classId = $("#classId").val();

                $('.monday').each(function() {
                    mondayPeriods.push($(this).val())
                });
                $('.tuesday').each(function() {
                    tuesdayPeriods.push($(this).val())
                });
                $('.wednesday').each(function() {
                    wednesdayPeriods.push($(this).val())
                });
                $('.thursday').each(function() {
                    thursdayPeriods.push($(this).val())
                });
                $('.friday').each(function() {
                    fridayPeriods.push($(this).val())
                });

                timeTable = [mondayPeriods, tuesdayPeriods, wednesdayPeriods, thursdayPeriods, fridayPeriods];
                timeTable = JSON.stringify(timeTable);
                console.log(timeTable);

                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        timeTable: timeTable,
                        classId: classId,
                        Function: "createTimetable",
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Successfully Created! </div>`);
                            // window.location.href = "home.php";
                        } else {
                            $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        }
                        setTimeout(function() {
                            $("#Result").html('');
                            window.location.reload();
                        }, 1000);
                    }
                });
            }
        });
    })
</script>
<?php
include($_SERVER['DOCUMENT_ROOT'] .'/Intern1/Includes/Footer.php');
?>