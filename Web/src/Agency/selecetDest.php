<?php
// Check if the country ID is set in the query parameters
if (isset($_GET['countryId'])) {
    $countryId = $_GET['countryId'];
    // Do something with the country ID, such as query database or process data
    echo "Selected Country ID: $countryId";
} else {
    echo "No country ID selected.";
}
?>
