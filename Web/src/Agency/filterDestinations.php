<?php
$conn = mysqli_connect("localhost", "root", "", "agencydb");
if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}

// Initialize filter variables
$filterType = isset($_POST['filter']) ? $_POST['filter'] : 'all';
$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '';

// Construct your SQL query based on the filters
$filterQuery = "";
if ($filterType !== 'all') {
    $filterQuery .= " AND d.Type = '$filterType'";
}
if (!empty($startDate)) {
    $filterQuery .= " AND d.StartDate >= '$startDate'";
}

$getData = "SELECT d.*, c.CountryName, c.CountryImage
            FROM Destination d
            INNER JOIN Country c ON d.CountryID = c.CountryID
            WHERE 1 $filterQuery";

$result = mysqli_query($conn, $getData);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $destName = $row['DestinationName'];
        $countryName = $row['CountryName'];
        $imagePath = 'assets/img/' . $row['DestinationImage'];
        $destID = $row['DestinationID'];

        // Output your destination cards
        echo "<div class='col-lg-4 col-sm-6 mb-4'>
                <div class='portfolio-item'>
                    <a class='portfolio-link' data-bs-toggle='modal' data-bs-target='#portfolioModal$destID'>
                        <div class='portfolio-hover'>
                            <div class='portfolio-hover-content'><i class='fas fa-plus fa-3x'></i></div>
                        </div>
                        <img class='img-fluid' src='$imagePath' alt='...' />
                    </a>
                    <div class='portfolio-caption'>
                        <div class='portfolio-caption-heading'>$destName</div>
                        <div class='portfolio-caption-subheading text-muted'>$countryName</div>
                    </div>
                </div>
            </div>";
    }
} else {
    echo "<div class='col'>No destinations found.</div>";
}

mysqli_free_result($result);
mysqli_close($conn);
?>
