<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
} else {
    $searchQuery = isset($_POST['search']) ? $_POST['search'] : '';
    $searchQuery = mysqli_real_escape_string($conn, $searchQuery); // Sanitize input

    if (!empty($searchQuery)) {
        // Modify query to search by country name or information
        $getData = "SELECT * FROM Country WHERE CountryName LIKE '%$searchQuery%' OR CountryInfo LIKE '%$searchQuery%'";
    } else {
        // Default query to get all countries
        $getData = "SELECT * FROM Country";
    }

    $result = mysqli_query($conn, $getData);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $countryName = $row['CountryName'];
            $info = $row['CountryInfo'];
            $imagePath = 'assets/img/' . $row['CountryImage'];
            $countryID = $row['CountryID'];

            echo "
            <div class='main-content' title='Click image for more info'>  
                <div class='card'>
                    <img src='$imagePath' alt='$countryName' class='card-img' data-toggle='modal' data-target='#exampleModal_$countryID'>
                    <div class='card-content'>
                        <input type='hidden' name='CountryID' value='$countryID'>
                        <h5>$countryName</h5>
                        <div class='card-actions'>
                            <form action='edit_country_form.php' method='post'>
                                <input type='hidden' name='country_id' value='$countryID'>
                                <button type='submit' class='material-icons-outlined' id='edit-country' onclick='return confirmEdit()'>edit</button>
                            </form>
                            <form action='delete_country.php' method='post'>
                                <input type='hidden' name='country_id' value='$countryID'>
                                <button type='submit' class='material-icons-outlined' id='delete-country' onclick='return confirmDelete()'>delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>";

            // Fetch destination names for the current country
            $destinations_query = "SELECT DestinationName FROM Destination WHERE CountryID = $countryID";
            $destinations_result = mysqli_query($conn, $destinations_query);

            // Modal to display more info about the country
            echo "
            <div class='modal fade' id='exampleModal_$countryID' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel_$countryID' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel_$countryID'>$countryName</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                            <img src='$imagePath' alt='$countryName' style='max-width: 100%; height: auto; margin: 0 auto;'>
                            <p><strong>Description:</strong></p>
                            <p style='white-space: pre-wrap;'>$info</p>
                            <p><strong>Destinations:</strong></p>";

            // Display destination names
            while ($destination_row = mysqli_fetch_assoc($destinations_result)) {
                $destinationName = $destination_row['DestinationName'];
                echo "<p>$destinationName</p>";
            }

            echo "
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
</html>