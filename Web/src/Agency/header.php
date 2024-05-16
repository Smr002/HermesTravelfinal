<!DOCTYPE html>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        #dropdown {
            position: relative;
            display: inline-block;


        }

        #dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;

        }

        #dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;

        }

        #dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        #dropdown:hover #dropdown-content {
            display: block;

        }

        .card {
            width: 400px;
            border: none;
            border-radius: 10px;
            background-color: #fff;
        }

        .stats {
            background: #f2f5f8 !important;
            color: #000 !important;
        }

        .articles {
            font-size: 10px;
            color: #a1aab9;
        }

        .number1 {
            font-weight: 500;
        }

        .followers {
            font-size: 10px;
            color: #a1aab9;
        }

        .number2 {
            font-weight: 500;
        }

        .rating {
            font-size: 10px;
            color: #a1aab9;
        }

        .number3 {
            font-weight: 500;
        }

        #pe {
            height: 1.9rem;
            margin-right: 1rem;
        }
    </style>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="assets/img/logos/logo12.jpg" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="http://localhost/web/src/Agency/main.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCountries" role="button" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
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

                    <li class="nav-item"><a class="nav-link" href="http://localhost/web/src/Agency/destinationsFrontEnd.php">Destinations</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownServices" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Other Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownServices">
                            <li>
                                <a class='dropdown-item ' href='http://localhost/web/src/Agency/accomodation.php'>Accommodation</a>
                            </li>
                            <li>
                                <a class='dropdown-item ' href='http://localhost/web/src/Agency/businessTravel.php'>Business Travel Albania</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>