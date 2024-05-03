<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $delete_sql = "DELETE FROM Client WHERE ClientID = '$id'";
    if (mysqli_query($conn, $delete_sql)) {
        echo "User deleted successfully!";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>