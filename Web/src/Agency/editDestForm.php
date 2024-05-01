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
