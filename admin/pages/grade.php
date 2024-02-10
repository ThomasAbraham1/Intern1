<?php
include('/xampp/htdocs/Intern1/Includes/Header.php');
include('../includes/Menu.php');


// Get grades
$sql = "SELECT * FROM erp_grade";
$result = mysqli_query($conn, $sql);
if ($result) {
    $grades = array();
    while ($row = $result->fetch_assoc()) {
        $grades[] = $row;
    }
}

// Get classes
$sql = "SELECT * FROM erp_class";
$result = mysqli_query($conn, $sql);
if ($result) {
    $classes = array();
    while ($row = $result->fetch_assoc()) {
        $classes[] = $row;
    }
}

// Get classes
$sql = "SELECT * FROM erp_exam";
$result = mysqli_query($conn, $sql);
if ($result) {
    $exams = array();
    while ($row = $result->fetch_assoc()) {
        $exams[] = $row;
    }
}

?>

<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Mark grades for your classes</h1>
                        <p>Marks can be published for various exams for your classes here.</p>
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


<div class="card m-3 w-100 text ">
    
<div id="Result" style="width:30%; position:absolute;left:60%; top:0%">
        </div>
    <div class="card-header">
    </div>
    <div class="card-body">
        <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#filterModal">
            <i class="btn-inner">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.56517 3C3.70108 3 3 3.71286 3 4.5904V5.52644C3 6.17647 3.24719 6.80158 3.68936 7.27177L8.5351 12.4243L8.53723 12.4211C9.47271 13.3788 9.99905 14.6734 9.99905 16.0233V20.5952C9.99905 20.9007 10.3187 21.0957 10.584 20.9516L13.3436 19.4479C13.7602 19.2204 14.0201 18.7784 14.0201 18.2984V16.0114C14.0201 14.6691 14.539 13.3799 15.466 12.4243L20.3117 7.27177C20.7528 6.80158 21 6.17647 21 5.52644V4.5904C21 3.71286 20.3 3 19.4359 3H4.56517Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
            <span>Filter grades</span>
        </a>
        <p id="tableHeading" class='h5 mb-4'></p>
        <div class="table-responsive mt-4">
            <table id="basic-table" class="table table-striped mb-0" role="grid">
                <thead>
                    <tr>
                        <th>Exam</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Mark</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php foreach ($grades as $grade) { ?>
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
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for filtering -->
<div class="modal fade" id="filterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Mark Grade For:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label" for="selectedClassForGrade">Class: </label>
                    <select id="selectedClassForGrade" name="type" class="selectpicker form-control" data-style="py-0">
                        <option hidden disabled selected value>Choose class</option>
                        <?php
                        foreach ($classes as $class) {
                        ?>
                            <option value="<?php echo $class['classId'] . ',' . $class['startingYear'] . ',' . $class['endingYear'] ?>"><?php echo $class['startingYear'] . ' to  ' . $class['endingYear'] . ' batch,  ' . $class['department'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="selectedSemester">Semester: </label>
                    <select id="selectedSemester" name="type" class="selectpicker form-control" data-style="py-0">
                        <option hidden disabled selected value>Choose Semester</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7'>7</option>
                        <option value='8'>8</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="selectedExamName">Exam: </label>
                    <select id="selectedExamName" name="type" class="selectpicker form-control" data-style="py-0">
                        <option hidden disabled selected value>Choose Exam</option>
                        <?php foreach ($exams as $exam) {
                        ?>
                            <option value="<?php echo $exam['examName'] ?>"><?php echo $exam['examName'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="text-start mt-2">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="chooseClassBtn">Select</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                </div>
            </div>
            <div id="result2"></div>
        </div>
    </div>
</div>

<!-- Modal for edit grade -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="transportForm">
                    <div class="modal-body editModalParent">
                        <div class="form-group">
                            <label for="studentNameEditField">Student Name:</label>
                            <input type="text" class="form-control" value="" id="studentNameEditField" placeholder="Enter Student Name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="markEditField">Mark:</label>
                            <input type="text" class="form-control" value="" id="markEditField" placeholder="Enter mark">
                        </div>
                    </div>
                </form>
                <div id="editResult"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="editModalSaveBtn" data-bs-dismiss="modal" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for deleting grade -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal2Label">Caution!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                <button type="button" id="delConfirmBtn" class="btn btn-danger">Yes</button>
            </div>
            <div id="DelResult"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".editBtn").click(function(e) {
            // Converting rowData into array
            var rowData = $(this).attr('rowData').replace(/\[|\]/g, '').split(',');
            console.log(rowData[2]);
            var gradeId = parseInt(rowData[0], 10);
            var studentName = rowData[1];
            var studentMark = rowData[2];
            $('#studentNameEditField').val(studentName);
            $('#markEditField').val(studentMark);

            $('#editModalSaveBtn').unbind().click(function() {
                studentMark = $('#markEditField').val();
                console.log('hlello');
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        gradeId: gradeId,
                        studentMark: studentMark,
                        Function: "updateGrade",
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Mark successfully updated! </div>`);
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
            })
        });
        $('#chooseClassBtn').click(function(e) {
            var isAnyFieldEmpty = 0;
            $('select').each(function(i, e) {
                if (!$(e).val()) {
                    $("#Result").html(`<div class="alert alert-danger fade show" role="alert">Fill all the filter fields.</div>`);
                    setTimeout(function() {
                        $("#Result").html('');
                    }, 5000);
                    isAnyFieldEmpty = 1;
                    return false;
                }
            })
            if (isAnyFieldEmpty) return false;

            var classData = $('#selectedClassForGrade').val();
            var classData = classData.split(',');
            var classId = classData[0];
            var startingYear = classData[1];
            var endingYear = classData[2];
            var semester = $('#selectedSemester').val();
            var examName = $('#selectedExamName').val();
            console.log(examName);

            $.ajax({
                url: '../functions.php',
                type: 'POST',
                data: {
                    classId: classId,
                    semester: semester,
                    examName: examName,
                    Function: "filterManageClassPage"
                },
                success: function(responseMsg) {
                    responseMsg = responseMsg.split('|');
                    response = responseMsg[1];
                    var rows = responseMsg[0];
                    console.log(response);

                    if (response == "OK") {
                        $('#tableHeading').html(startingYear + " to " + endingYear + " batch, semester - " + semester + "<br />" + examName);
                        $('#tableHeading').attr('classId', classId);
                        $('#tableBody').html(rows);
                        // window.location.href = "home.php";
                    } else {
                        $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                    }
                    // setTimeout(function() {
                    //     $("#Result").html('');
                    //     window.location.reload();
                    // }, 1000);
                }
            })
        })
    });
</script>
<?php
include('/xampp/htdocs/Intern1/Includes/Footer.php');
?>