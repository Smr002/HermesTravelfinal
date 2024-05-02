<?php
$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}

// Check if country ID is received
if(isset($_POST['DestinationID'])) {
    $destID = $_POST['DestinationID'];

    // Retrieve country details from database
    $getCountryQuery = "SELECT * FROM destination WHERE DestinationID = '$destID'";
    $result = mysqli_query($conn, $getCountryQuery);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $destName = $row['DestinationName'];
        $description = $row['DestinationInfo'];
        $image = $row['DestinationImage'];
        $destPrice = $row['DestinationPrice'];
        $startDate = $row['StartDate'];
        $endDate = $row['EndDate'];
        $destType = $row['Type'];

        ?>
        <!DOCTYPE html>
        <html>
        <head lang="en">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Destination Dashboard</title>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
            <link rel="stylesheet" href="css/styles1.css">
        </head>
        <body>
        <div class="add-form" id="add-country-form">
            <h3>Edit Country</h3>
            <form action="editDest.php" id="country-form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="destID" value="<?php echo $destID; ?>">
                <input type="text" name="dest-name" placeholder="Destination Name" value="<?php echo $destName; ?>">
                <textarea name="description" placeholder="Description"><?php echo $description; ?></textarea>
                <input type="file" name="image" accept=".jpg, .jpeg, .png" value="<?php echo $image; ?>">
                <input type = "text" name ="destPrice" placeholder="Price" value="<?php echo $destPrice; ?>">
                <input type = "date" name ="startDate" placeholder="Start Date" value="<?php echo $startDate; ?>">
                <input type = "date" name ="endDate" placeholder="End Date" value="<?php echo $endDate; ?>">
               <select name="destType" value="<?php echo $destType; ?>">
                <option value = "Adventure">Adventure</option>
                <option value = "Relaxation">Relaxation</option>
                <option value = "Historical">Historical</option>
                <option value = "Cultural">Cultural</option>
                <option value = "Other">Other</option>">
                </select>
                <input type="submit" class="btn btn-primary" name="submitDestEdit">
                <button type="button" class="btn btn-secondary" id="cancel-country-btn">Cancel</button>
            </form>
        </div>
        </body>
        </html>
        <?php
    } else {
        echo "No country found with ID: $destID";
    }

    // Free result and close connection
    mysqli_free_result($result);
    mysqli_close($conn);
} else {
    echo "No country ID received.";
}
?>
