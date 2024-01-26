<?php
include('/xampp/htdocs/Intern1/Includes/Header.php');
include('../includes/Menu.php');

// Select all admission forms

$sql = "SELECT * FROM `erp_admission`";
$result = mysqli_query($conn, $sql);
if ($result) {
    $admissionForms = array();
    while ($row = $result->fetch_assoc()) {
        $admissionForms[] = $row;
    }
}

// Select starting year and semester from erp class
// $sql = "SELECT * FROM `erp_class`";
// $result = mysqli_query($conn, $sql);
// if ($result) {
//     $classes = array();
//     while ($row = $result->fetch_assoc()) {
//         $classes[] = $row;
//     }
// }
?>

<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Manage Admissions</h1>
                        <p>Admissions can be managed here, edited or deleted.</p>
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
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Phone </th>
                                    <th>DOB</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($admissionForms as $admissionForm) {
                                    echo "<tr admissionId='$admissionForm[admissionId]'>
                                        <td>$admissionForm[name]</td>
                                        <td>$admissionForm[email]</td>
                                        <td>$admissionForm[phone]</td>
                                        <td>$admissionForm[dob]</td>
                                        <td>$admissionForm[address]</td>" ?>
                                    <?php $sql = "SELECT active FROM `erp_login` WHERE user_id = $admissionForm[userId]";
                                    $result = mysqli_query($conn, $sql);
                                    $active = $result->fetch_assoc() ?>
                                    <td>
                                        <button type="button" userId="<?php echo $admissionForm['userId'] ?>" class="btn btn-outline-<?php echo $active == 1 ? 'success' : 'danger' ?> statusBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" name="active"><?php echo $active == 1 ? 'Active' : 'Inactive' ?></button>
                                    </td>
                                    <td>
                                        <button type='button' userId="<?php echo $admissionForm['userId'] ?>" value='$TableRow[tr_id]' class='btn btn-primary editBtn' data-bs-toggle='modal' data-bs-target='#editModal'>
                                            Edit
                                        </button>
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
<!-- Modal for edit admission form -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Admission Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="transportForm">
                    <div class="modal-body editElementParent">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="" id="name" placeholder="Enter Name" list="routenos">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" value="" id="email" placeholder="Enter Email" list="routes">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="number" class="form-control" value="" value="" id="phone" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" value="" id="dob" placeholder="Date of Birth">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" value="" id="address" placeholder="Address">
                        </div>
                    </div>
                </form>
                <div id="editResult"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="editAdmissionFormSaveBtn" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for deleting admission form -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal2Label">Caution!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to change the status?
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
    $(document).ready(function(e) {
        // Edit admission Form
        $(".editBtn").click(function(event) {
            var userId = $(this).attr('userId');
            console.log(userId);
            var admissionForm = $(this).parent().parent().children();
            var admissionFormArray = [];
            admissionForm.each(function() {
                if ($(this).find('button').length) {
                    return true;
                }
                admissionFormArray.push($(this).html());
            });
            var j = 0;
            for (var i = 1; i < $('.editElementParent').children().children().length; i = i + 2) {
                $('.editElementParent').children().children()[i].value = admissionFormArray[j];
                j++;
            }
            $('#editAdmissionFormSaveBtn').unbind().click(function(e) {
                var name = $("#name").val();
                var email = $("#email").val();
                var dob = $("#dob").val();
                var address = $("#address").val();
                var phone = $("#phone").val();

                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        name: name,
                        email: email,
                        address: address,
                        dob: dob,
                        phone: phone,
                        userId: userId,
                        Function: "updateAdmissionForm",
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#editResult").html(`<div class="alert alert-success fade show" role="alert"> Successfully Updated! </div>`);
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
        // Delete / Accept the admission form
        $('.statusBtn').click(function() {
            var userId = $(this).attr('userId');
            console.log(userId);
            $('.statusChangeBtn').unbind().click(function() {
                var statusChangeBtnValue = $(this).html();
                console.log(statusChangeBtnValue);
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        statusChangeBtnValue: statusChangeBtnValue,
                        userId: userId,
                        Function: "admissionOrNot",
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Successfully Updated! </div>`);
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
        })
    })
</script>
<?php
include('/xampp/htdocs/Intern1/Includes/Footer.php');
?>