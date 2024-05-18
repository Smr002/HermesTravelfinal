<?php
session_start();





if (isset($_POST['payment'])) {
  $conn = mysqli_connect("localhost", "root", "", "agencydb");
  if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
  }

  // Capture additional information
  $clientUsername = $_SESSION['username'];
  $destName = $_POST['destName'];
  
  // Fetch the destination price from the database
  $dest_query = "SELECT DestinationPrice,Revenue FROM Destination WHERE DestinationName='$destName'";
  $dest_result = mysqli_query($conn, $dest_query);
  if ($dest_result && mysqli_num_rows($dest_result) > 0) {
    $dest_row = mysqli_fetch_assoc($dest_result);
    $productPrice = $dest_row['DestinationPrice'];
    $dest_revenue = $dest_row['Revenue'];
$total_revenue = $dest_revenue + $productPrice;
$add_rev_query = "UPDATE Destination SET Revenue = $total_revenue WHERE DestinationName='$destName'";
if (!mysqli_query($conn, $add_rev_query)) {
  echo "<script>alert('Error updating revenue: " . mysqli_error($conn) . "')</script>";
} 

    

    // Continue with your code to update client spending and other operations
    $client_query = "SELECT ClientName, ClientSurname, Spending, Email FROM Client WHERE Username = '$clientUsername'";
    $client_result = mysqli_query($conn, $client_query);
    if ($client_result && mysqli_num_rows($client_result) > 0) {
      $row = mysqli_fetch_assoc($client_result);
      $spending = $row['Spending'];
      $total_spending = $spending + $productPrice;  // Assuming this is the correct variable for the product price
      $clientName = $row['ClientName'];
      $clientSurname = $row['ClientSurname'];
      $clientEmail= $row['Email'];

      // Update Spending in the Client table
      $update_query = "UPDATE Client SET Spending = $total_spending WHERE Username = '$clientUsername'";
      if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Spending updated successfully')</script>";
      } else {
        echo "<script>alert('Error updating Spending')</script>" . mysqli_error($conn);
      }
    } else {
      echo "<script>alert('Client not found')</script>";
    }

    mysqli_free_result($client_result);
  } else {
    echo "<script>alert('Destination not found')</script>";
  }

  mysqli_free_result($dest_result);
  mysqli_close($conn);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bill</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <style>
    body {
      margin-top: 20px;
      background: rgb(197, 155, 0);
    }

    .card-footer-btn {
      display: flex;
      align-items: center;
      border-top-left-radius: 0 !important;
      border-top-right-radius: 0 !important;
    }

    .text-uppercase-bold-sm {
      text-transform: uppercase !important;
      font-weight: 500 !important;
      letter-spacing: 2px !important;
      font-size: 0.85rem !important;
    }

    .hover-lift-light {
      transition: box-shadow 0.25s ease, transform 0.25s ease,
        color 0.25s ease, background-color 0.15s ease-in;
    }

    .justify-content-center {
      justify-content: center !important;
    }

    .btn-group-lg>.btn,
    .btn-lg {
      padding: 0.8rem 1.85rem;
      font-size: 1.1rem;
      border-radius: 0.3rem;
    }

    .btn-dark {
      color: #fff;
      background-color: #1e2e50;
      border-color: #1e2e50;
    }

    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 1px solid rgba(30, 46, 80, 0.09);
      border-radius: 0.25rem;
      box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }

    .p-5 {
      padding: 3rem !important;
    }

    .card-body {
      flex: 1 1 auto;
      padding: 1.5rem 1.5rem;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
      border-color: inherit;
      border-style: solid;
      border-width: 0;
    }

    .table td,
    .table th {
      border-bottom: 0;
      border-top: 1px solid #edf2f9;
    }

    .table> :not(caption)>*>* {
      padding: 1rem 1rem;
      background-color: var(--bs-table-bg);
      border-bottom-width: 1px;
      box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
    }

    .px-0 {
      padding-right: 0 !important;
      padding-left: 0 !important;
    }

    .table thead th,
    tbody td,
    tbody th {
      vertical-align: middle;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
      border-color: inherit;
      border-style: solid;
      border-width: 0;
    }

    .mt-5 {
      margin-top: 3rem !important;
    }

    .icon-circle[class*="text-"] [fill]:not([fill="none"]),
    .icon-circle[class*="text-"] svg:not([fill="none"]),
    .svg-icon[class*="text-"] [fill]:not([fill="none"]),
    .svg-icon[class*="text-"] svg:not([fill="none"]) {
      fill: currentColor !important;
    }

    .svg-icon>svg {
      width: 1.45rem;
      height: 1.45rem;
    }
  </style>
</head>

<body>
  <div class="container mt-6 mb-7">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-xl-7">
        <div class="card">
          <div class="card-body p-5">
            <h2>Hey <?php echo $clientName; ?>,</h2>
            <p class="fs-sm">
              This is the receipt for a payment of
              <strong><?php echo $productPrice; ?></strong> (USD) you made to Hermes Travel.
            </p>

            <div class="border-top border-gray-200 pt-4 mt-4">
              <div class="row">
                <div class="col-md-6">
                  <div class="text-muted mb-2">Payment No.</div>
                  <?php
                  // Generate a random payment number
                  $paymentNumber = '#' . rand(10000, 99999); // Generates a random 5-digit number prefixed with #
                  ?>
                  <strong><?php echo $paymentNumber; ?></strong>
                </div>
                <div class="col-md-6 text-md-end">
                  <div class="text-muted mb-2">Payment Date</div>
                  <?php
                  // Get the current date and format it
                  $paymentDate = date("M/d/Y");
                  ?>
                  <strong><?php echo $paymentDate; ?></strong>
                </div>
              </div>
            </div>

            <div class="border-top border-gray-200 mt-4 py-4">
              <div class="row">
                <div class="col-md-6">
                  <div class="text-muted mb-2">Client</div>
                  <strong><?php echo $clientName.' '.$clientSurname;?></strong>
                  <p class="fs-sm">
                    <br />
                    <a href="#!" class="text-purple"><?php echo $clientEmail; ?></a>
                  </p>
                </div>
                <div class="col-md-6 text-md-end">
                  <div class="text-muted mb-2">Payment To</div>
                  <strong> Hermes Travel</strong>
                  <p class="fs-sm">
                  
                    <br />
                    <a href="#!" class="text-purple">joelsswipefile@gmail.com</a>
                  </p>
                </div>
              </div>
            </div>

            <table class="table border-bottom border-gray-200 mt-3">
              <thead>
                <tr>
                  <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">
                    Description
                  </th>
                  <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-0">
                    DETAILS
                  </th>
                </tr>
              </thead>
              <tbody>
              <tr>
                  <td class="px-0">Destination Name</td>
                  <td class="text-end px-0"><?php echo $destName; ?></td>
                </tr>
                <tr>
                  <td class="px-0">Destination Price</td>
                  <td class="text-end px-0"><?php echo '$'.$productPrice; ?></td>
                </tr>
                <tr>
                  <td class="px-0">Added Tax</td>
                  <?php
                  $tax=0.2*$productPrice;
                  ?>
                  <td class="text-end px-0"><?php echo '$'.$tax; ?></td>
                </tr>
              </tbody>
            </table>

            <div class="mt-5">
              <div class="d-flex justify-content-end mt-3">
                <h5 class="me-3">Total:</h5>
                <?php
                  $final_price=$productPrice+$tax;
                  ?>
                <h5 class="text-success"><?php echo '$'.$final_price; ?></h5>
              </div>
              <form action="generatePDF.php" target="_blank" method="post">
    <!-- Include any necessary hidden fields to pass data -->
    <input type="hidden" name="username" value="<?php echo $clientUsername; ?>">
    <input type="hidden" name="destName" value="<?php echo $destName; ?>">
    <input type="hidden" name="productPrice" value="<?php echo $productPrice; ?>">
    <input type="hidden" name="clientName" value="<?php echo $clientName; ?>">
    <input type="hidden" name="clientSurname" value="<?php echo $clientSurname; ?>">
    <input type="hidden" name="clientEmail" value="<?php echo $clientEmail; ?>">
    <input type="hidden" name="paymentNumber" value="<?php echo $paymentNumber; ?>">
    <input type="hidden" name="paymentDate" value="<?php echo $paymentDate; ?>">
    <input type="hidden" name="finalPrice" value="<?php echo $final_price; ?>">
    <button class="btn btn-primary text-uppercase" type="submit">Generate Bill</button>
    
</form>
<button class="btn btn-primary text-uppercase">
    <a href='main.php' style="color: inherit; text-decoration: none;">Home</a>
</button>



            </div>
          </div>
          <a href="#!"
            class="btn btn-dark btn-lg card-footer-btn justify-content-center text-uppercase-bold-sm hover-lift-light">

          </a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>