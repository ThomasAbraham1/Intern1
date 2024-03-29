<?php

include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/faculty/includes/Menu.php');
$log_id = $user_id;
?>




<?php

// Execute an SQL query
$sql = "SELECT * FROM `erp_leave` JOIN erp_login on erp_leave.f_id=erp_login.user_id WHERE erp_leave.f_id ='" . $log_id . "'"; // Add WHERE Clause with given session fid
$result = mysqli_query($conn, $sql);
// Process the result set
$TableRows = array();
// Process the result set
while ($row = mysqli_fetch_assoc($result)) {
    // Do something with each row
    array_push($TableRows, $row);
}
?>





<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Manage Leave</h1>
                        <p>Here you can find all of your Leave Details.</p>
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




<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <!-- <h4 class="card-title">Bootstrap Datatables</h4> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>Staff Name</th>
                                    <th>Department</th>
                                    <th>Leave Type</th>
                                    <th>Leave Reason</th>
                                    <th>Applied Date</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Alteration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($TableRows as $TableRow) {
                                    $Stime = DateTime::createFromFormat('H:i:s', $TableRow['lv_stime']);
                                    $etime = DateTime::createFromFormat('H:i:s', $TableRow['lv_etime']);
                                    $formattedStime = $Stime->format('H:i');
                                    $formattedEtime = $etime->format('H:i');

                                    echo "<tr>
                                        <td>$TableRow[f_name] $TableRow[l_name]</td>
                                        <td>$TableRow[f_dept]</td>
                                        <td>$TableRow[lv_type]</td>
                                        <td>$TableRow[lv_reason]</td>
                                        <td>$TableRow[lv_applyon]</td>
                                        <td>$TableRow[lv_sdate] $formattedStime</td>
                                        <td>$TableRow[lv_edate] $formattedEtime</td>
                                        <td class='text-center' ><a class='hyperlink' onload='myFunc()' href='/Intern1/Faculty/pages/leave/ManageLeaveAlternatives.php?Menu=ManageImages&LeaveId=$TableRow[lv_id]&leaveStartingDate=$TableRow[lv_sdate]&leaveEndingDate=$TableRow[lv_edate]' >
                                        <form class='fid' action='/Leave/trial.php'>
                                        <input type='hidden' value='$TableRow[f_id]'>
                                    </form>
                                        <img src='/Intern1/img/EditIcon.png' class='w-25 h-25'alt='Icon'>
                                        </a></td>
                                    </tr>";
                                }
                                ?>




                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>


</script>




<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Footer.php');


?>