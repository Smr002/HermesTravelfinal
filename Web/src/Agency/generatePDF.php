<?php
session_start();
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define $productPrice and other variables if not defined yet
    $productPrice = isset($_POST['productPrice']) ? $_POST['productPrice'] : 0;
    $tax = 0.2 * $productPrice;
    $final_price = $productPrice + $tax;

    // Create the HTML content based on the POST data
    $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Bill</title>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
      <style>
        body {
          font-family: Arial, sans-serif;
          margin: 20px;
          background: #f7f7f7;
          color: #333;
        }
        .card {
          background: #ffffff;
          border: 1px solid #ddd;
          padding: 20px;
          margin-top: 20px;
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .text-muted { color: #777; }
        .text-right { text-align: right; }
        .table { width: 100%; margin-top: 20px; }
        th, td {
          padding: 8px;
          text-align: left;
          border-bottom: 1px solid #ddd;
        }
      </style>
    </head>
    <body>
      <div class="container">
        <div class="card">
          <h2>Receipt for ' . htmlspecialchars($_POST['clientName'], ENT_QUOTES) . '</h2>
          <p>This is the receipt for a payment of <strong>$' . htmlspecialchars(number_format($productPrice, 2), ENT_QUOTES) . '</strong> (USD) you made to Hermes Travel.</p>
          <table class="table">
            <tr>
              <td>Payment No.</td>
              <td>' . htmlspecialchars($_POST['paymentNumber'], ENT_QUOTES) . '</td>
            </tr>
            <tr>
              <td>Payment Date</td>
              <td>' . htmlspecialchars($_POST['paymentDate'], ENT_QUOTES) . '</td>
            </tr>
            <tr>
              <td>Destination Name</td>
              <td>' . htmlspecialchars($_POST['destName'], ENT_QUOTES) . '</td>
            </tr>
            <tr>
              <td>Destination Price</td>
              <td>$' . htmlspecialchars(number_format($productPrice, 2), ENT_QUOTES) . '</td>
            </tr>
            <tr>
              <td>Added Tax</td>
              <td>$' . htmlspecialchars(number_format($tax, 2), ENT_QUOTES) . '</td>
            </tr>
            <tr>
              <td><strong>Total:</strong></td>
              <td><strong>$' . htmlspecialchars(number_format($final_price, 2), ENT_QUOTES) . '</strong></td>
            </tr>
          </table>
        </div>
      </div>
    </body>
    </html>';

    // Initialize DOMPDF
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("payment_details.pdf", array("Attachment" => 0)); // Set Attachment to 1 to force download

    //send email with pdf attached
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'joelsswipefile@gmail.com';
    $mail->Password = 'hghpnekarepehnmv ';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('joelsswipefile@gmail.com', 'Joel');
    $mail->addAddress($_POST['clientEmail']);
    $mail->isHTML(true);
    $mail->Subject = 'Payment Receipt';
    $mail->Body = 'Please find attached the payment receipt for your recent payment to Hermes Travel.';
    $mail->addAttachment($dompdf->output(), 'payment_details.pdf');
   
    $mail->send();
} else {
    echo "<script>alert('Error: Form not submitted.')</script>";

    // Redirect to the form page
    header("Location: main.php");

    exit;
}
?>