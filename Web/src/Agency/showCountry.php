<?php
$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM country";
if (isset($_POST['search'])) {
    $searchQuery = mysqli_real_escape_string($conn, $_POST['search']);
    $query .= " WHERE CountryName LIKE '{$searchQuery}%'";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Countries</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/styles1.css'>
    <style>
        .modal-content {
            background-color: #F8F9FA;
            color: #000000;
        }
        .card-img {
            width: 100%;
            height: 90px;
        }
        .card {
            height: 350px;
        }
    </style>
</head>
<body>";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $countryName = htmlspecialchars($row['CountryName']);
        $info = htmlspecialchars($row['CountryInfo']);
        $imagePath = 'assets/img/' . htmlspecialchars($row['CountryImage']);
        $countryID = $row['CountryID'];

        echo "
        <div class='main-content' title='Click image for more info'>  
            <div class='card'>
                <img src='$imagePath' alt='$countryName' class='card-img'>
                <div class='card-content'>
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
        </div>
        ";
    }
} else {
    echo "<p>No countries found.</p>";
}

mysqli_free_result($result);
mysqli_close($conn);

echo "
<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
<script>
    function confirmEdit() {
        return confirm('Are you sure you want to edit this country?');
    }

    function confirmDelete() {
        return confirm('Are you sure you want to delete this country?');
    }
</script>
</body>
</html>";
?>
