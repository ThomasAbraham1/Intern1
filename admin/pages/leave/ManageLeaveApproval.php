<?php


include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/admin/includes/Menu.php');
$log_id = $user_id;

//For the table
$sql = "SELECT * FROM erp_leave_alt";
$result = mysqli_query($conn, $sql);
$TableRows = array();
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['la_staffacpt'] == 1 and $row['la_principalacpt'] != 1) {
        array_push($TableRows, $row);
    }
}

//for the staff dropdown
$sql = 'SELECT * FROM erp_login';
$result = mysqli_query($conn, $sql);
$EventRows = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($EventRows, $row);
}

//for the class dropdown
$sql = 'SELECT * FROM erp_class';
$result = mysqli_query($conn, $sql);
$EventRows1 = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($EventRows1, $row);
}


// leave table
$sql = 'SELECT * FROM erp_leave';
$result = mysqli_query($conn, $sql);
$EventRows2 = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($EventRows2, $row);
}




mysqli_close($conn);
?>







<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Manage Leave Approval</h1>
                        <p>Here you can find all of your Leave Approval Details here.</p>
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
</div>



<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header ">
                    <div class="header-title d-flex justify-content-end">
                        <div id="Result" class="m-3"></div>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    $i = 0;
                    // Finding unique lv_ids in erp_leave_alt
                    $uniqueLvIdArray = [];
                    foreach ($TableRows as $TableRow) {
                        array_push($uniqueLvIdArray, $TableRow['lv_id']);
                    }
                    $uniqueLvIdArray = array_unique($uniqueLvIdArray);
                    // Creating the spoilers
                    $requestingStaff = "";
                    $leaveType = "";
                    foreach ($uniqueLvIdArray as $uniqueLvId) {
                        // Checking if all the alterations are staff accepted in one lv_id
                        foreach ($TableRows as $TableRow) {
                            if ($TableRow['lv_id'] == $uniqueLvId) {
                                if ($TableRow['la_staffacpt'] == 0) {
                                    break 2;
                                }
                            }
                        }

                        foreach ($EventRows2 as $row) {
                            if ($row['lv_id'] == $uniqueLvId) {
                                $leaveType = ($row['lv_type'] == 'cl') ? 'Casual Leave' : (($row['lv_type'] == 'ml') ? 'Medical Leave' : 'Permission');
                                $requestingStaffId = $row['f_id'];
                            }
                        }
                        $altStaffDeptName = "";
                        foreach ($EventRows as $row) {
                            if ($row['user_id'] == $requestingStaffId) {
                                $requestingStaffName = $row['f_name'] . " " . $row['l_name'];
                                $altStaffDeptName = $row['department'];
                                $altStaffEmail = $row['userName'];
                            }
                        }
                        $approverEmail = $userName;
                        // echo "Requesting Staff Email: $altStaffEmail /n HOD email: $approverEmail";

                        echo "
                        <div class='accordion' id='accordionExample'>
                        <div class='accordion-item'>
                        <h4 class='accordion-header' id='heading{$i}'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse{$i}' aria-expanded='false' aria-controls='collapse{$i}'>
                            [{$leaveType}]<strong> &nbsp{$requestingStaffName}&nbsp </strong> from {$altStaffDeptName} Dept
                        </button>
                    </h4>
                    <div id='collapse{$i}' class='accordion-collapse collapse' aria-labelledby='heading{$i}' data-bs-parent='#accordionExample'>
                        <div class='accordion-body align-items-center'>
                        ";
                    ?>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>aleration staff</th>
                                        <th>alteration class</th>
                                        <th>alteration date</th>
                                        <th>alteration hour</th>
                                        <th>staff accept</th>
                                        <th>admin accept</th>
                                    </tr>
                                </thead>
                                <?php foreach ($TableRows as $TableRow) {
                                    $staffaccept = $TableRow['la_staffacpt'] == 0 ? "false" : "true";
                                    $principalaccept = $TableRow['la_principalacpt'] == 0 ? "false" : "true";
                                    if ($TableRow['lv_id'] == $uniqueLvId) {
                                        // Alteration staff Name and department
                                        $staffName = "";
                                        foreach ($EventRows as $row) {
                                            if ($row['user_id'] == $TableRow['f_id']) {
                                                $staffName = "$row[f_name] $row[l_name]";
                                            }
                                        }
                                        // Finding the class name with dept, semester and year
                                        $ClassName = "";
                                        foreach ($EventRows1 as $row) {
                                            if ($row['classId'] == $TableRow['cls_id'])
                                                $ClassName = "$row[course]-$row[department]-Sem-$row[semester]";
                                        }
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $staffName; ?>
                                            </td>
                                            <td>
                                                <?php echo $ClassName; ?>
                                            </td>
                                            <td>
                                                <?php echo $TableRow['la_date'] ?>
                                            </td>
                                            <td>
                                                <?php echo $TableRow['la_hour'] ?>
                                            </td>
                                            <td>
                                                <?php echo $staffaccept ?>
                                            </td>
                                            <td>
                                                <?php echo $principalaccept ?>
                                            </td>
                                    <?php
                                    }
                                }
                                    ?>
                            </table>

                        <?php
                        $valueArray = [];
                        array_push($valueArray, $f_role);
                        array_push($valueArray, $altStaffEmail);
                        array_push($valueArray, $approverEmail);
                        $valueArray = json_encode($valueArray);
                        echo "</div>
                               </div>
                               <div id='accordionBtn' style='text-align:right' >
                                   <button id='$uniqueLvId' type='button' value='$valueArray' class='btn btn-soft-success'>Approve</button>
                                   <button id='$uniqueLvId' type='button' value='$valueArray' class='btn btn-soft-danger'>Deny</button>
                               </div>
                           </div>
                           </div>";

                        $i++;
                    }
                        ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#accordionBtn button").click(function(e) {
            var button = $(this);
            if (button.hasClass('btn-soft-success')) {
                LeaveVal = 1;
                Approval = "Approved";
                var btnName = 'approve';
            } else {
                LeaveVal = 0;
                Approval = "Denied";
                var btnName = 'delete';
            }
            var LeaveId = button.attr('id');
            var lFormBtnValue = JSON.parse(button.val());
            var role = lFormBtnValue[0];
            var altStaffEmail = lFormBtnValue[1];
            var approverEmail = lFormBtnValue[2];
            console.log(role, altStaffEmail, approverEmail);

            if (confirm('Are you sure you want to ' + btnName + '?')) {
                $.ajax({
                    url: '../../functions.php',
                    type: 'POST',
                    data: {
                        altStaffEmail: altStaffEmail,
                        approverEmail: approverEmail,
                        role: 'principal',
                        LeaveId: LeaveId,
                        LeaveVal: LeaveVal,
                        Approval: Approval,
                        Function: "ApproveLeaveId"
                    },
                    success: function(response) {
                        var response = JSON.parse(response);
                        console.log(response)
                        var responseStatus = response[0];
                        var notificationStatus = response[1];
                        console.log(notificationStatus);
                        // console.log(JSON.parse(response)[0]);
                        if (responseStatus == "OK") {
                            $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Leave Alteration ${Approval} Successfully ${notificationStatus}</div>`);
                            setTimeout(function() {
                                $("#Result").html('');
                                $('#CreateLeaveAlternative').modal('hide');
                                location.reload();
                            }, 3000);
                        } else {
                            $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                            setTimeout(function() {
                                $("#Result").html('');
                            }, 3000);
                        }
                    }
                });
            } else {
                e.preventDefault(); // Prevent the default action of the button
            }
        });
    });
</script>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Footer.php');

?>