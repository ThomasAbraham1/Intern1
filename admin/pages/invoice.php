<?php

use Dompdf\Dompdf;
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require '../../../vendor/autoload.php';
$invoiceData = $_POST['invoiceData'];
$invoiceData = explode(',', $invoiceData);
$receiptId = $invoiceData[0];
$studentId = $invoiceData[1];
$studentName = $invoiceData[2];
$className = $invoiceData[3];
$date = $invoiceData[4];
$fees = $invoiceData[5];
$fees = explode('/', $invoiceData[5]);
$amounts = $invoiceData[6];
$amounts = explode('/', $invoiceData[6]);
$total = array_sum($amounts);

?>

<?php
$html = "
<html>

<head>
    <meta charset='utf-8' />
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
    @page { margin: 0px; }
body { margin: 0px; }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
        .is-approved {
            color: #0A9928;
            border: 0.5rem solid #0A9928;
            -webkit-mask-position: 13rem 6rem;
            transform: rotate(-14deg);
          border-radius: 0;
        } 
        .stamp {
            float:right;
            padding: 0 50%;
            transform: rotate(12deg);
              color: #555;
              font-size: 3rem;
              font-weight: 700;
              border: 0.25rem solid #555;
              display: inline-block;
              padding: 0.25rem 1rem;
              text-transform: uppercase;
              border-radius: 1rem;
              font-family: 'Courier';
              -webkit-mask-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/8399/grunge.png');
            -webkit-mask-size: 944px 604px;
            mix-blend-mode: multiply;
          }
    </style>
</head>

<body>
    <div class='invoice-box'>
        <table cellpadding='0' cellspacing='0'>
            <tr class='top'>
                <td colspan='2'>
                    <table>
                        <tr>
                            <td class='title'>
                                <h5 style='font-family:didot, sans-serif; margin:0'>Tom CMS</h3>
                            </td>

                            <td>
                                Receipt #:" . $receiptId . "<br />
                                Created: " . $date . "<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class='information'>
                <td colspan='2'>
                    <table>
                        <tr>
                            <td>
                                Tom, Inc.<br />
                                12345 Pearl Road<br />
                                Sunnyville, CA 12345
                            </td>

                            <td>
                                " . $studentName . "<br />
                                " . $className . "
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>



            <tr class='heading'>
                <td>Fees</td>
                <td>Price</td>
            </tr>";

// Loop through your fees array
foreach ($fees as $i => $feeName) {
    $html .= "<tr class='item'>
                <td>$feeName</td>
                <td>$amounts[$i]</td>
            </tr>";
}

$html .= "<tr class='total'>
                <td></td>

                <td>Total: Rs. " . $total . "</td>
            </tr>
        </table>
    </div>
    <span class='stamp is-approved'>Paid</span>
</body>

</html>";
?>


<?php
$dompdf = new Dompdf;
$dompdf->loadhtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('invoice.pdf');
?>