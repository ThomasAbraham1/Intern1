<?php
include( $_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Header.php');
include('../includes/Menu.php');

// Select all admission forms

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
                        <h1>Manage Class</h1>
                        <p>Classes can be managed here, edited , deleted , promoted or demoted</p>
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


<div class="conatiner-fluid content-inner mt-n5 py-0 mb-4">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-betweenmb-4">
                    <div class="header-title">
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>class Id</th>
                                    <th>startingYear</th>
                                    <th>endingYear</th>
                                    <th>semester</th>
                                    <th>department</th>
                                    <th>course</th>
                                    <th>Promote</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($classes as $class) {
                                    echo "<tr>
                                        <td>$class[classId]</td>" ?>
                                    <?php
                                    echo "<td>$class[startingYear]</td>
                                    <td>$class[endingYear]</td>
                                    <td>$class[semester]</td>
                                    <td>$class[department]</td>
                                    <td>$class[course]</td>
                                    ";
                                    ?>
                                    <td>
                                        <button type='button' classId="<?php echo $class['classId'] ?>" class='btn btn-info promoteBtn' data-bs-toggle='modal' data-bs-target='#promoteModal'>
                                            Promote
                                        </button>
                                    </td>
                                    <td>
                                        <button type='button' rowData="<?php echo $class['classId'] . ',' . $class['startingYear'] . ',' . $class['endingYear'] . ',' . $class['semester'] . ',' . $class['department'] . ',' . $class['course'] ?>" class='btn btn-primary editBtn' data-bs-toggle='modal' data-bs-target='#editModal'>
                                            Edit
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" classId="<?php echo $class['classId'] ?>" class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                    </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="form-group mx-auto ">
                    <button id="createTimetableBtn" type="submit" class="btn btn-primary">Save</button>
                </div> -->
            </div>
            <div id="Result"></div>
        </div>
    </div>
</div>

<!-- Change status modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change status to</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- Row 1 -->
                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-outline-success statusChangeBtn">Accept</button>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-outline-danger statusChangeBtn">Reject</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="d-grid gap-2">
                <div id='Result'></div>
            </div>
            <div class="modal-footer">
                <button type="button" id="modalCloseBtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for edit Class -->
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
                            <label for="startingYear">Starting Year:</label>
                            <input type="number" class="form-control" value="" value="" id="startingYear" placeholder="Enter starting year">
                        </div>
                        <div class="form-group">
                            <label for="endingYear">Ending Year:</label>
                            <input type="number" class="form-control" value="" value="" id="endingYear" placeholder="Enter ending year">
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester:</label>
                            <input type="number" class="form-control" value="" value="" id="semester" placeholder="Enter semester">
                        </div>
                        <div class="form-group">
                            <label for="department">Department:</label>
                            <input type="text" class="form-control" value="" id="department" placeholder="Enter department">
                        </div>
                        <div class="form-group">
                            <label for="course">Course:</label>
                            <input type="text" class="form-control" value="" id="course" placeholder="Enter course">
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
<!-- Modal for deleting Fees -->
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

<!-- Modal for promoting class -->
<div class="modal fade" id="promoteModal" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal2Label">Caution!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to promote?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" id="promoteConfirmBtn" class="btn btn-info">Yes</button>
            </div>
            <div id="promoteResult"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(e) {
        // Promote class
        $(".promoteBtn").click(function(event) {
            var classId = $(this).attr('classId');
            $('#promoteConfirmBtn').unbind().click(function(e) {
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        classId: classId,
                        Function: "promoteClass",
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#promoteResult").html(`<div class="alert alert-success fade show" role="alert"> Successfully Promoted! </div>`);
                            // window.location.href = "home.php";
                        } else {
                            $("#promoteResult").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        }
                        setTimeout(function() {
                            $("#promoteResult").html('');
                            window.location.reload();
                        }, 1000);
                    }
                });
            })
        });
        // Edit class
        $(".editBtn").click(function(event) {
            var rowData = $(this).attr('rowData');
            rowData = rowData.split(',');
            var classId = rowData[0];
            var startingYear = rowData[1];
            var endingYear = rowData[2];
            var semester = rowData[3];
            var department = rowData[4];
            var course = rowData[5];

            $('#course').val(course);
            $('#department').val(department);
            $('#semester').val(semester);
            $('#startingYear').val(startingYear);
            $('#endingYear').val(endingYear);

            console.log(`${course} ${department} ${semester} ${endingYear} ${startingYear} ${classId}`);
            $('#editModalSaveBtn').unbind().click(function(e) {
                course = $('#course').val();
                department = $('#department').val();
                semester = $('#semester').val();
                startingYear = $('#startingYear').val();
                endingYear = $('#endingYear').val();
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        classId: classId,
                        course: course,
                        department: department,
                        semester: semester,
                        endingYear: endingYear,
                        startingYear: startingYear,
                        Function: "updateClass",
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#editResult").html(`<div class="alert alert-success fade show" role="alert"> Successfully Edited! </div>`);
                            // window.location.href = "home.php";
                        } else {
                            $("#editResult").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        }
                        setTimeout(function() {
                            $("#editResult").html('');
                            window.location.reload();
                        }, 1000);
                    }
                });
            })
        });

        // Delete Class
        $('.deleteBtn').click(function() {
            var classId = $(this).attr('classId');
            console.log(classId);
            $('#delConfirmBtn').unbind().click(function() {
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        classId: classId,
                        Function: "deleteClass",
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#DelResult").html(`<div class="alert alert-success fade show" role="alert"> Successfully Deleted! </div>`);
                            // window.location.href = "home.php";
                        } else {
                            $("#DelResult").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        }
                        setTimeout(function() {
                            $("#DelResult").html('');
                            window.location.reload();
                        }, 1000);
                    }
                });

            })
        })
    })
</script>
<?php
include($_SERVER['DOCUMENT_ROOT'] .'/Intern1/Includes/Footer.php');
?>