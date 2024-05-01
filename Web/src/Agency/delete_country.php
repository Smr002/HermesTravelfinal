<?php

if(isset($_POST['country_id'])) {
  
    $conn = mysqli_connect("localhost", "root", "", "agencydb");


    if (!$conn) {
        die("Connection Failed : " . mysqli_connect_error());
    }

  
    $countryId = $_POST['country_id'];

    $deleteQuery = "DELETE FROM country WHERE CountryID = '$countryId'";

    // Execute the delete query
    if (mysqli_query($conn, $deleteQuery)) {
   
        mysqli_close($conn);
   
        echo "<script>window.location.href = 'countries.php';</script>";
        exit; 
    } else {
        echo "Error deleting country: " . mysqli_error($conn);
    }
} else {

    echo "No country ID received.";
}
?>
