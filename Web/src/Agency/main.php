<!DOCTYPE html>
<html lang="en">

<head>
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
    <?php
    include "isLoggedIn.php";
    ?>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <?php


            // Check if the user is logged in
            if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                // Redirect to h2.php if the session is active
                echo "
        <div class='masthead-subheading'>Welcome To Our Agency!</div>
        <div class='masthead-heading text-uppercase'>Welcome Back {$_SESSION['username']}.</div>
    ";
            } else {
                echo "
        <div class='masthead-subheading'>Welcome To Our Agency!</div>
        <div class='masthead-heading text-uppercase'>It's Nice To Meet You</div>
        <a class='btn btn-primary btn-xl text-uppercase' href='http://localhost/web/src/Agency/signIn.php'>Sign In</a>
    ";
            }
            ?>



    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Our Principle</h2>

            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Get Best Price</h4>
                    <p class="text-muted">Pay through our application and save thousands and get amazing rewards/p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Local experts</h4>
                    <p class="text-muted">Destination Management Company in Balkans and doing this for more than 4 years
                        now</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Value for money</h4>
                    <p class="text-muted">We have very competitive prices thanks to our long time investment in
                        systemsand our contracting team</p>
                </div>
            </div>
        </div>
        <div class="row">
    <!-- Portfolio Grid -->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Some of our suggestions for you</h2>
                <h3 class="section-subheading text-muted">Enjoy!!!</h3>
            </div>
            <div class="row">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "agencydb");
                $getData = "SELECT d.*, c.CountryName, c.CountryImage
                FROM Destination d
                INNER JOIN Country c ON d.CountryID = c.CountryID
                ORDER BY RAND()
                LIMIT 6;";
                $result = mysqli_query($conn, $getData);

                if (mysqli_num_rows($result) > 0) {
                    $count = 0; // Initialize count
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
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
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
                        $count++;
                        if ($count == 3) { // Check if count is 3, close the first row
                            echo '</div><div class="row">';
                        }
                    }
                }
                mysqli_free_result($result);
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </section>
</div>


</div> <!-- Close the last row -->

<!-- About -->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">REVIEWS</h2>
            <h3 class="section-subheading text-muted">Here is what some of our previous clients have to say</h3>
        </div>
        <ul class="timeline">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "agencydb");
            $getReviews = "SELECT ClientName, Reviews FROM Client WHERE Type = 'User' ORDER BY RAND() LIMIT 4"; // Fetch 4 random reviews from clients of type 'User'
            $result = mysqli_query($conn, $getReviews);
            $leftAligned = true; // Flag to alternate text alignment

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <li class="<?php echo $leftAligned ? '' : 'timeline-inverted'; ?>">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/<?php echo rand(1, 4); ?>.jpg"
                                alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?php echo $row['ClientName']; ?></h4> <!-- Display client's name as subheading -->
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted"><?php echo $row['Reviews']; ?></p> <!-- Display review text -->
                            </div>
                        </div>
                    </li>
                    <?php
                    $leftAligned = !$leftAligned; // Toggle text alignment for the next iteration
                }
            }
            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
            <li class="<?php echo $leftAligned ? '' : 'timeline-inverted'; ?>">
                <div class="timeline-image">
                    <h4>
                        Be Part
                        <br />
                        Of Our
                        <br />
                        Story!
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</section>

<?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
               
            } else {
             echo "   <!-- Team-->
    <section class='page-section bg-light' id='team'>
        <div class='container'>
            <div class='text-center'>
                <h2 class='section-heading text-uppercase'>Our Amazing DEVELOPERS</h2>
                <p class='text-muted'>Together with their LinkedIn profiles</p>
            </div>
            <div class='row'>
                <div class='col-lg-4'>
                    <div class='team-member'>
                        <img class='mx-auto rounded-circle' src='assets/img/team/kristi.jpg' alt='...' />
                        <h4>Kristi Samara</h4>
                        <p class='text-muted'>Team Leader & Full-Stack Developer</p>
                        <a class='btn btn-dark btn-social mx-2' href='https://www.linkedin.com/in/kristi-samara-a6a408294/?originalSubdomain=al' aria-label='LinkedIn Profile'><i
                                class='fab fa-linkedin-in'></i></a>
                    </div>
                </div>
                <div class='col-lg-4'>
                    <div class='team-member'>
                        <img class='mx-auto rounded-circle' src='assets/img/team/engjell.jpg' alt='...' />
                        <h4>Engjell Abazaj</h4>
                        <p class='text-muted'>Full-Stack Developer</p>
                        <a class='btn btn-dark btn-social mx-2' href='https://www.linkedin.com/in/engjell-abazaj-43b0aa20b/'
                            aria-label='D LinkedIn Profile'><i class='fab fa-linkedin-in'></i></a>
                    </div>
                </div>
                <div class='col-lg-4'>
                    <div class='team-member'>
                        <img class='mx-auto rounded-circle' src='assets/img/team/bori.jpg' alt='...' />
                        <h4>Borian Llukacaj</h4>
                        <p class='text-muted'>Full-Stack Developer</p>
                        <a class='btn btn-dark btn-social mx-2' href='https://www.linkedin.com/in/borian-llukacaj-685a9b2a0/' aria-label='LinkedIn Profile'><i
                                class='fab fa-linkedin-in'></i></a>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-4'>
                    <div class='team-member'>
                        <img class='mx-auto rounded-circle' src='assets/img/team/indrit.jpg' alt='...' />
                        <h4>Indrit Ferati</h4>
                        <p class='text-muted'>Front-End Developer</p>
                        <a class='btn btn-dark btn-social mx-2' href='https://www.linkedin.com/in/indrit-ferati-968394228/' aria-label='LinkedIn Profile'><i
                                class='fab fa-linkedin-in'></i></a>
                    </div>
                </div>
                <div class='col-lg-4'>
                    <div class='team-member'>
                        <img class='mx-auto rounded-circle' src='assets/img/team/eri.jpg' alt='...' />
                        <h4>Ermin Lilaj</h4>
                        <p class='text-muted'>Front-End Developer</p>
                        <a class='btn btn-dark btn-social mx-2' href='https://www.linkedin.com/in/ermin-lilaj-300057169/'
                            aria-label='D LinkedIn Profile'><i class='fab fa-linkedin-in'></i></a>
                    </div>
                </div>
                <div class='col-lg-4'>
                    <div class='team-member'>
                        <img class='mx-auto rounded-circle' src='assets/img/team/joel.jpg' alt='...' />
                        <h4>Joel Bitri</h4>
                        <p class='text-muted'>Back-End Developer</p>
                        <a class='btn btn-dark btn-social mx-2' href='https://www.linkedin.com/in/joel-bitri-2b8649232/' aria-label='LinkedIn Profile'><i
                                class='fab fa-linkedin-in'></i></a>
                    </div>
                </div>
            </div>
            <div class='row justify-content-center'>
           <div class='col-lg-4' style='align: center'>
                    <div class='team-member'>
                        <img class='mx-auto rounded-circle' src='assets/img/team/alesio.jpg' alt='...' />
                        <h4>Alesio Rajta</h4>
                        <p class='text-muted'>Database Engineer</p>
                        <a class='btn btn-dark btn-social mx-2' href='https://www.linkedin.com/in/alesio-rajta-b288ab27a/' aria-label='LinkedIn Profile'><i
                                class='fab fa-linkedin-in'></i></a>
                    </div>
            </div>
            

            <div class='row'>
                <div class='col-lg-8 mx-auto text-center'>
                    <p class='large text-muted'>Hermes Travel - Travel Like A GOD!</p>
                </div>
            </div>
        </div>
    </section>";
            } ?>

           
   
    <!-- Clients-->
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg"
                            alt="..." aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg"
                            alt="..." aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg"
                            alt="..." aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg"
                            alt="..." aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {


        include_once "footer.php";
    } else {
        include_once "footerContactUs.php";

    }
    ?>?>
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Threads
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Illustration
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Explore
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Graphic Design
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Finish
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Identity
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 4 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Lines
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Branding
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 5 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Southwest
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Website Design
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 6 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Window
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Photography
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>