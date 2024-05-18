<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
} else {
    $searchQuery = isset($_POST['search']) ? $_POST['search'] : '';
    $searchQuery = mysqli_real_escape_string($conn, $searchQuery); // Sanitize input

    if (!empty($searchQuery)) {
        // Modify query to search by country name or information
        $getData = "SELECT * FROM Destination WHERE DestinationName LIKE '%$searchQuery%' OR DestinationInfo LIKE '%$searchQuery%'";
    } else {
        // Default query to get all countries
        $getData = "SELECT * FROM Destination";
    }

    $result = mysqli_query($conn, $getData);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $countryName = $row['DestinationName'];
            $info = $row['DestinationInfo'];
            $imagePath = 'assets/img/' . $row['DestinationImage'];
            $price = $row['DestinationPrice'];
            $type = $row['Type'];
            $start = $row['StartDate'];
            $end = $row['EndDate'];
            $destID = $row['DestinationID'];

            echo "
            <div class='main-content' title='Click image for more info'>  
                <div class='card'>
                    <img src='$imagePath' alt='$countryName' class='card-img' >
                    <div class='card-content'>
                         <h5>$countryName</h5>
                        <div class='card-actions'>
                            <form action='editDestForm.php' method='post'>
                                <input type='hidden' name='DestinationID' value='$destID'>
                                <button type='submit' class='material-icons-outlined' id='edit-country' onclick='return confirmEdit()'>edit</button>
                            </form>
                            <form action='deleteDest.php' method='post'>
                                <input type='hidden' name='DestinationID' value='$destID'>
                                <button type='submit' class='material-icons-outlined' id='delete-country' onclick='return confirmDelete()'>delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>";
            ////////////////

            $destinations_query = "SELECT DestinationName FROM Destination WHERE DestinationID = $destID";
            $destinations_result = mysqli_query($conn, $destinations_query);
            
            echo "
            <div class='modal fade' id='exampleModal_$destID' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel_$destID' aria-hidden='true' style='display: none;'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content' style='background-color: #F8F9FA; width: 80%; margin:0 auto;'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel_$destID'>$countryName</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                            <img src='$imagePath' alt='$countryName' style='max-width: 100%; height: auto; margin: 0 auto;'>
                            <p><strong>Description:</strong></p>
                            <p style='white-space: pre-wrap;'>$info</p>
                            <p><strong>Price:</strong> $price</p>
                            <p><strong>Type:</strong> $type</p>
                            <p><strong>Start Date:</strong> $start</p>
                            <p><strong>End Date:</strong> $end</p>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                        </div>
                    </div>
                </div>
            </div>";
        }
    } else {
        echo "No countries found.";
    }

    mysqli_free_result($result);
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles1.css">
    <style>
        /* Custom style for modal */
        .modal-content {
            background-color: #F8F9FA; /* Light gray background */
            color: #000000; /* Black text */
        }
        .card-img{
            width: 100%;
            height: 90px;
        }
        .card{
            height:350px;
        }
        </style>

</head>
<body>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function confirmEdit(){
        return confirm("Are you sure you want to edit this destination?");
    }

    function confirmDelete() {
        return confirm("Are you sure you want to delete this country?");
    }

    // Open modal when card is clicked
    $(document).ready(function() {
    // Open modal when card is clicked
    $('.main-container').on('click', '.card img', function() {
        // Get the ID of the clicked destination
        var destID = $(this).closest('.card').find('input[name=DestinationID]').val();
        $('#exampleModal_'+destID).modal('show'); // Show the corresponding modal
    });
});

</script>

</body>
</html>