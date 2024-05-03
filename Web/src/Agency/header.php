<html>

<head lang="en">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="assets/img/logos/logo12.jpg" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="http://localhost/web/src/Agency/main.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCountries" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Countries
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownCountries">
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "agencydb");

                            if (!$conn) {
                                die("Connection Failed : " . mysqli_connect_error());
                            } else {
                                $getData = "SELECT * FROM country";
                                $result = mysqli_query($conn, $getData);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $countryId = $row['CountryID'];
                                        $countryName = $row['CountryName'];
                                        echo "<li><a class='dropdown-item' href='countriesFrontEnd.php?countryId=$countryId'>$countryName</a></li>";
                                        


                                    }
                                }
                                mysqli_free_result($result);
                                mysqli_close($conn);
                            }
                            ?>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link"
                            href="http://localhost/web/src/Agency/destinationsFrontEnd.php">Destinations</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="http://localhost/web/src/Agency/transportation.php">Transportation</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Other services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>