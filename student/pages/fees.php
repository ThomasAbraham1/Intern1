<?php
include( $_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Header.php');
include('../includes/Menu.php');

// Get Fees
$sql = "SELECT * FROM erp_fees WHERE classId = $classId";
$result = mysqli_query($conn, $sql);
if ($result) {
    $fees = array();
    while ($row = $result->fetch_assoc()) {
        $fees[] = $row;
    }
}


?>

<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Fees</h1>
                        <p>Check your pending fees. Pay your fees right away onilne!</p>
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

<!-- Create a course form -->

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <?php
                    if (!$isPaid && $classId != 0) { ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="mb-2">Invoice </h4>
                                    <h5 class="mb-3"> </h5>
                                    <p></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-4">
                                    <div class="table-responsive-lg">
                                        <table class="table" id='userId' userId='<?php echo $user_id ?>'>
                                            <thead>

                                                <tr>
                                                    <th scope="col">Fee</th>
                                                    <th class="text-center" scope="col">Price</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php foreach ($fees as $fee) { ?>
                                                    <tr class="feeNameAndAmountRow">
                                                        <td>
                                                            <h6 class="mb-0"><?php echo $fee['feeName'] ?></h6>
                                                            <p class="mb-0">
                                                            </p>
                                                        </td>
                                                        <td class="text-center amount"><?php echo $fee['amount'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td>
                                                        <h6 class="mb-0">Net Amount</h6>
                                                    </td>
                                                    <td class="text-center"><b id='total'></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="mb-0 mt-4">
                                        <span style="color:red">*</span>
                                        If there by any transactional errors in processing the payment, you can always contact your immediate higher up and report the incident for a resolve with refund.
                                    </p>
                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#paymentModal" class="btn btn-success">Pay Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-12">
                                    <h4 class="mb-2">No pending fee!</h4>
                                    <h5 class="mb-3"> </h5>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                <?php }
                 ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal for payment confirmation-->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal2Label">Caution!</h5>
                <button type="button" class="btn-close permAssignCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to make the payment?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                <button type="button" id="paymentConfirmBtn" class="btn btn-success">Yes</button>
            </div>
            <div id="paymentResult"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var total = 0;
        var feeAmounts = [];
        $('.amount').each(function() {
            feeAmounts.push($(this).html());
            console.log($(this).html());
            total += parseInt($(this).html(), 10);
        });
        console.log(total);
        $("#total").html('Rs. ' + total);
        var userId = $('#userId').attr('userId');
        var feeNames = [];
        $('.feeNameAndAmountRow').each(function(e) {
            var feeName = $(this).children(':eq(0)').children(':eq(0)').html();
            feeNames.push(feeName);
        });
        feeObject = {};
        $.each(feeNames, function(e, i) {
            feeObject[i] = feeAmounts[e];
        });
        console.log(feeObject);
        // FeesObject is the json with fee name and respect amount
        // Payment confirmation - Yes
        $('#paymentConfirmBtn').click(function() {
            ;
            // console.log(userId);
            // AJAX CALL FOR INSERTING 
            $.ajax({
                url: '../functions.php',
                type: 'POST',
                data: {
                    userId: userId,
                    feeObject: feeObject,
                    Function: "paymentSuccess"
                },
                success: function(response) {
                    console.log(response);
                    if (response == "OK") {
                        $("#paymentResult").html(`<div class="alert alert-success fade show" role="alert"> Successfully Paid! </div>`);
                        // window.location.href = "home.php";
                    } else {
                        $("#paymentResult").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                    }
                    setTimeout(function() {
                        $("#paymentResult").html('');
                        window.location.reload();
                    }, 1000);

                }
            });
        });
    });
</script>
<?php
include('/xampp/htdocs/Intern1/Includes/Footer.php');
?>