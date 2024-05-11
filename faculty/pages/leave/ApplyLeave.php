<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/faculty/includes/Menu.php');


// Execute an SQL query
$sql = "SELECT * FROM erp_login WHERE user_id = '" . $user_id . "'";
$result = mysqli_query($conn, $sql);
$EventRows = array();
// Process the result set
while ($row = mysqli_fetch_assoc($result)) {
    // Do something with each row
    array_push($EventRows, $row);
}
// print_r($EventRows);
// Close the database connection



mysqli_close($conn);
?>



<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Stay Updated With TOM CMS</h1>
                        <p>You can find the updates and annoucements here. </p>
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
<div class="card m-3 w-50">
    <div class="card-header">
        Apply Leave
    </div>
    <div class="card-body">
        <!-- <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a> -->

        <form id="applyLeaveForm">
            <div class="form-group">
                <label for="Event">Select Name</label>
                <select class="form-control" id="Staff" name="Staff" required data-parsley-trigger="change">
                    <?php
                    foreach ($EventRows as $Event) {
                        echo "<option value=" . $Event['user_id'] . ">" . $Event['f_name'] . " " . $Event['l_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="LeaveType">Select Leave Type</label>
                <select class="form-control" id="LeaveType" name="LeaveType" required data-parsley-trigger="change">
                    <option value="cl">Casual Leave</option>
                    <option value="ml">Medical Leave</option>
                    <option value="permission">Permission</option>
                    <option value="csl">Compensation Leave</option>
                    <option value="od">On-Duty(OD)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="leave_days">Leave Duration (in days)</label>
                <input type="number" id="leave_days" name="leave_days" class="form-control" onchange="toggleDateInputs()" min="1" required data-parsley-trigger="change">
            </div>
            <div class="form-group">
                <label for="LeaveStartDate">Leave Start Date</label>
                <input type="date" id="LeaveStartDate" name="LeaveStartDate" class="form-control range_flatpicker" placeholder="Range Date Picker" disabled required data-parsley-trigger="change">
            </div>
            <div class="form-group">
                <label for="LeaveEndDate">Leave End Date</label>
                <input type="date" id="LeaveEndDate" name="LeaveEndDate" class="form-control range_flatpicker" placeholder="Range Date Picker" disabled required data-parsley-trigger="change">
            </div>
            <div class="form-group">
                <label for="LeaveStartTime">Leave Start Time</label>
                <input type="time" id="LeaveStartTime" name="LeaveStartTime" class="form-control time_flatpicker" placeholder="Time Picker"  data-parsley-trigger="change">
            </div>
            <div class="form-group">
                <label for="LeaveEndTime">Leave End Time</label>
                <input type="time" id="LeaveEndTime" name="LeaveEndTime" class="form-control time_flatpicker" placeholder="Time Picker"  data-parsley-trigger="change">
            </div>
            <div class="form-group">
                <label for="LeaveReason" >Leave Reason</label>
                <textarea type="text" name="LeaveReason" class="form-control" id="LeaveReason" placeholder="" required data-parsley-trigger="change"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Apply Leave</button>
        </form>
        <div id="Result" class="m-3"></div>

    </div>
</div>
<!-- JavaScript code to handle form submission with AJAX -->
<script>
    $(function() {
        $('#applyLeaveForm').parsley().on('field:validated', function() {
                var ok = $('.parsley-error').length === 0;
                $('.bs-callout-info').toggleClass('hidden', !ok);
                $('.bs-callout-warning').toggleClass('hidden', ok);
            })
            .on('form:submit', function() {
                return false; // Don't submit form for this demo
            });
    });

    $("#applyLeaveForm").submit(function(e) {
        if ($('#applyLeaveForm').parsley().isValid()) {
            var StaffId = $("#Staff").val();
            var LeaveType = $("#LeaveType").val();
            var LeaveStartDate = $("#LeaveStartDate").val();
            var LeaveEndDate = $("#LeaveEndDate").val();
            var LeaveStartTime = $("#LeaveStartTime").val();
            var LeaveEndTime = $("#LeaveEndTime").val();
            var LeaveReason = $("#LeaveReason").val();

            console.log(StaffId +
                LeaveType +
                LeaveStartDate +
                LeaveEndDate +
                LeaveStartTime +
                LeaveEndTime +
                LeaveReason);
            // console.log('test');
            $.ajax({
                url: '/Intern1/faculty/functions.php',
                type: 'POST',
                data: {
                    StaffId: StaffId,
                    LeaveType: LeaveType,
                    LeaveStartDate: LeaveStartDate,
                    LeaveEndDate: LeaveEndDate,
                    LeaveStartTime: LeaveStartTime,
                    LeaveEndTime: LeaveEndTime,
                    LeaveReason: LeaveReason,
                    Function: "CreateLeave"
                },
                success: function(response) {
                    console.log(response);
                    if (response == "OK") {
                        $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Leave Created Successfully</div>`);
                        setTimeout(function() {
                            $("#Result").html('');
                            location.reload();
                        }, 5000);
                    } else {
                        $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        setTimeout(function() {
                            $("#Result").html('');
                        }, 5000);

                    }

                }
            });
        }
    })
</script>
<script>
    function toggleDateInputs() {
        var leaveDays = parseInt($("#leave_days").val());
        var leaveType = $("#LeaveType").val();

        if (leaveType === "permission") {
            $("#LeaveStartTime").prop("disabled", false);
            $("#LeaveEndTime").prop("disabled", false);
        } else {
            $("#LeaveStartTime").prop("disabled", true);
            $("#LeaveEndTime").prop("disabled", true);
        }

        if (leaveDays === 1) {
            $("#LeaveStartDate").prop("disabled", false);
            $("#LeaveEndDate").prop("disabled", true);
        } else if (leaveDays > 1) {
            $("#LeaveStartDate").prop("disabled", false);
            $("#LeaveEndDate").prop("disabled", false);
        } else {
            $("#LeaveStartDate").prop("disabled", true);
            $("#LeaveEndDate").prop("disabled", true);
        }
    }
</script>


<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Footer.php');

?>