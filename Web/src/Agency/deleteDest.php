<?php

if(isset($_POST['DestinationID'])) {
  
    $conn = mysqli_connect("localhost", "root", "", "agencydb");


    if (!$conn) {
        die("Connection Failed : " . mysqli_connect_error());
    }

  
    $destId = $_POST['DestinationID'];

    $deleteQuery = "DELETE FROM destination WHERE DestinationID = '$destId'";

    // Execute the delete query
    if (mysqli_query($conn, $deleteQuery)) {
   
        mysqli_close($conn);
   
        echo "<script>window.location.href = 'destinations-admin.php';</script>";
        exit; 
    } else {
        echo "Error deleting destination: " . mysqli_error($conn);
    }
} else {

    echo "No destination ID received.";
}
?>
