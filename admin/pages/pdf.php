<?php
use Dompdf\Dompdf;
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require '../../../vendor/autoload.php';
$tableRowsAndInfo = $_POST['reportTableRows'];
$tableRowsAndInfo = explode(',',$tableRowsAndInfo);
$tableRows = $tableRowsAndInfo[0];
$info = $tableRowsAndInfo[1];
?>


<?php $html = "<!DOCTYPE html>

<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Report Header</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
        }

        .signature-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding: 0 20px;
            width: 80%;
            /* Ensure the same width as the table */
            margin: 0 auto;
            /* Center the signature container */
        }

        .signature {
            width: 45%;
            /* Adjust the width of signature fields */
            text-align: center;
            /* Add bottom border */
            margin-bottom: 20px;
            /* Add margin for spacing */
        }

        table {
            width: 80%;
            /* Constrain the table width */
            margin: 0 auto;
            /* Center the table */
            border-collapse: collapse;
            margin-bottom: 5%;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class='header'>
        <h1>TOM CMS</h1>
        <p>". $info ."</p>
    </div>

    <table>
        <thead>
            <tr>
            <th>SI.NO</th>
            <th>Student ID</th>
            <th>Total Hours</th>
            <th>Attended Hours</th>
            <th>Attendance %</th>
            <th>Overall Hours</th>
            <th>Overall Att. Hours</th>
            <th>Overall Att. %</th>
            </tr>
        </thead>
        <tbody>" . $tableRows .
    "</tbody>
    </table>

    <div class='signature-container'>
        <div class='signature'>
            <p>Signature of Principal:</p>
        </div>
        <div class='signature'>
            <p>Signature of Class Teacher:</p>
        </div>
    </div>
</body>

</html>"
?>

<?php
$dompdf = new Dompdf;
$dompdf -> loadhtml($html);
$dompdf->setPaper('A4','portrait');
$dompdf ->render();
$dompdf->stream('reportAttendance.pdf'); 
?>