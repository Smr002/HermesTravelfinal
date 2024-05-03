<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your meta tags, CSS, and other head content here -->
</head>

<body id="page-top">
    <!-- Your PHP code here -->
    <?php include "isLoggedIn.php"; ?>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">OUR destinations</h2>
                <h3 class="section-subheading text-muted">Something for everyone...</h3>
            </div>
            <!-- Add filter form -->
            <div class="filter-container">
                <form id="filterForm" method="post">
                    <label for="filter">Filter by type:</label>
                    <select id="filter" name="filter">
                        <option value="all">All</option>
                        <option value="adventure">Adventure</option>
                        <option value="relaxation">Relaxation</option>
                        <option value="historical">Historical</option>
                        <option value="cultural">Cultural</option>
                        <option value="other">Other</option>
                    </select>

                    <label for="startDate">Start Date:</label>
                    <input type="date" id="startDate" name="startDate">

                    <input class="btn btn-primary text-uppercase" type="submit" name="submit" value="Apply Filters">
                </form>
            </div>
            <br><br>

            <div class="row">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "agencydb");
                if (!$conn) {
                    die("Connection Failed : " . mysqli_connect_error());
                } else {
                    if (isset($_POST['submit'])) {

                        $filterDate = $_POST['startDate'];
                        $filterType = $_POST['filter'];

                        $getData = "SELECT d.*, c.CountryName, c.CountryImage
                        FROM Destination d
                        INNER JOIN Country c ON d.CountryID = c.CountryID
                        WHERE '$filterDate' BETWEEN d.StartDate AND d.EndDate AND d.Type = '$filterType';";
                        if ($filterType == "all") {
                            echo "<script>window.location.href = 'destinationsFrontEnd.php';</script>";

                        }
                        $result = mysqli_query($conn, $getData);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $destName = $row['DestinationName'];
                            $info = $row['DestinationInfo'];
                            $imagePath = 'assets/img/' . $row['DestinationImage'];
                            $price = $row['DestinationPrice'];
                            $type = $row['Type'];
                            $start = $row['StartDate'];
                            $end = $row['EndDate'];
                            $countryName = $row['CountryName'];
                            $imagePathCountry = 'assets/img/' . $row['CountryImage'];
                            $destID = $row['DestinationID'];
                            $destType = $row['Type'];


                            ?>
                            <div class='col-lg-4 col-sm-6 mb-4'>
                                <div class='portfolio-item'>
                                    <a class='portfolio-link' data-bs-toggle='modal'
                                        data-bs-target='#portfolioModal<?php echo $destID; ?>'>
                                        <div class='portfolio-hover'>
                                            <div class='portfolio-hover-content'><i class='fas fa-plus fa-3x'></i></div>
                                        </div>
                                        <img class='img-fluid' src='<?php echo $imagePath; ?>' alt='...' />
                                    </a>
                                    <div class='portfolio-caption'>
                                        <div class='portfolio-caption-heading'><?php echo $destName; ?></div>
                                        <div class='portfolio-caption-subheading text-muted'><?php echo $countryName; ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Portfolio Modal -->
                            <div class='portfolio-modal modal fade' id='portfolioModal<?php echo $destID; ?>' tabindex='-1'
                                role='dialog' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'><?php echo $destName; ?> Details</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal'
                                                aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <h2 class='text-uppercase'><?php echo $destName; ?></h2>
                                            <p class='item-intro text-muted'><?php echo $countryName; ?></p>
                                            <img class='img-fluid d-block mx-auto custom-img-class' src='<?php echo $imagePath; ?>'
                                                alt='...' />

                                            <p><?php echo $info; ?></p>
                                            <ul class='list-inline'>
                                                <li>
                                                    <strong>Price:</strong>
                                                    <?php echo $price . "$"; ?>
                                                </li>
                                                <li>
                                                    <strong>Start Date: </strong>
                                                    <?php echo $start; ?>
                                                </li>
                                                <li>
                                                    <strong>End Date: </strong>
                                                    <?php echo $end; ?>
                                                </li>
                                                <li>
                                                    <strong>Type: </strong>
                                                    <?php echo $destType; ?>
                                                </li>


                                            </ul>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                            <?php


                                            if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                                                $redirect_url = "http://localhost/web/src/Agency/paymentForm.php";
                                            } else {
                                                $redirect_url = "signIn.php";
                                            }
                                            ?>

                                            <a href='<?php echo "$redirect_url?destID=$destID" ?>'
                                                style='color: inherit; text-decoration: none;'>Book Now</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        $getData = "SELECT d.*, c.CountryName, c.CountryImage
                        FROM Destination d
                        INNER JOIN Country c ON d.CountryID = c.CountryID;";
                        $result = mysqli_query($conn, $getData);

                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                $destName = $row['DestinationName'];
                                $info = $row['DestinationInfo'];
                                $imagePath = 'assets/img/' . $row['DestinationImage'];
                                $price = $row['DestinationPrice'];
                                $type = $row['Type'];
                                $start = $row['StartDate'];
                                $end = $row['EndDate'];
                                $countryName = $row['CountryName'];
                                $imagePathCountry = 'assets/img/' . $row['CountryImage'];
                                $destID = $row['DestinationID'];
                                $destType = $row['Type'];
                                ?>
                                <div class='col-lg-4 col-sm-6 mb-4'>
                                    <div class='portfolio-item'>
                                        <a class='portfolio-link' data-bs-toggle='modal'
                                            data-bs-target='#portfolioModal<?php echo $destID; ?>'>
                                            <div class='portfolio-hover'>
                                                <div class='portfolio-hover-content'><i class='fas fa-plus fa-3x'></i></div>
                                            </div>
                                            <img class='img-fluid' src='<?php echo $imagePath; ?>' alt='...' />
                                        </a>
                                        <div class='portfolio-caption'>
                                            <div class='portfolio-caption-heading'><?php echo $destName; ?></div>
                                            <div class='portfolio-caption-subheading text-muted'><?php echo $countryName; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Portfolio Modal -->
                                <div class='portfolio-modal modal fade' id='portfolioModal<?php echo $destID; ?>' tabindex='-1'
                                    role='dialog' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title'><?php echo $destName; ?> Details</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal'
                                                    aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                <h2 class='text-uppercase'><?php echo $destName; ?></h2>
                                                <p class='item-intro text-muted'><?php echo $countryName; ?></p>
                                                <img class='img-fluid d-block mx-auto custom-img-class' src='<?php echo $imagePath; ?>'
                                                    alt='...' />

                                                <p><?php echo $info; ?></p>
                                                <ul class='list-inline'>
                                                    <li>
                                                        <strong>Price:</strong>
                                                        <?php echo $price . "$"; ?>
                                                    </li>
                                                    <li>
                                                        <strong>Start Date: </strong>
                                                        <?php echo $start; ?>
                                                    </li>
                                                    <li>
                                                        <strong>End Date: </strong>
                                                        <?php echo $end; ?>
                                                    </li>
                                                    <li>
                                                        <strong>Type: </strong>
                                                        <?php echo $destType; ?>
                                                    </li>


                                                </ul>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                <?php


                                                if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                                                    $redirect_url = "http://localhost/web/src/Agency/paymentForm.php";
                                                } else {
                                                    $redirect_url = "signIn.php";
                                                }
                                                ?>

                                                <a href='<?php echo "$redirect_url?destID=$destID" ?>'
                                                    style='color: inherit; text-decoration: none;'>Book Now</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }

                    }
                    mysqli_free_result($result);
                    mysqli_close($conn);
                }

                include "footer.php";
                ?>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- Script to handle modal display -->
    <script>
        function showModal(modalId) {
            var myModal = new bootstrap.Modal(document.getElementById(modalId), {
                keyboard: false
            });
            myModal.show();
        }

        function applyFilters() {
            confirm("Are you sure you want to apply these filters?");
        }

    </script>
</body>

</html>