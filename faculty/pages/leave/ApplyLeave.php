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