<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Albania</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            .filter-container {
                margin-bottom: 20px;
            }

            #filterForm {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            #filter {
                padding: 5px;
            }
        </style>
    </head>
    <body id="page-top">
    <?php
        include_once "header.php";
    ?>


    
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">ALBANIA</h2>
                    <h3 class="section-subheading text-muted">Albania , officially the Republic of Albania (Albanian: Republika e Shqipërisë), is a country in Southeast Europe. It is in the Balkans, on the Adriatic and Ionian Seas within the Mediterranean Sea, and shares land borders with Montenegro to the northwest, Kosovo to the northeast, North Macedonia to the east</h3>
                </div>
                <!-- Add this inside your <div class="container"> before <div class="row"> -->
                <div class="filter-container">
                <form id="filterForm">
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

                    <button class="btn btn-primary text-uppercase" type="button" onclick="applyFilters()">Apply Filters</button>
                </form>
            </div>

                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/albania.jpg" alt="..."/>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Berat</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/albania.jpg" alt="..."/>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Berat</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/albania.jpg" alt="..."/>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Berat</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/albania.jpg" alt="..."/>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Berat</div>
                            </div>
                        </div>
                    </div>
        </section>
           <!-- Footer-->
        <?php include_once 'footer.php'?>
        
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Berat</h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/albania.jpg" alt="..." />
                                    <p>There will be some random info here...</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Price:</strong>
                                            100$
                                        </li>
                                        <li>
                                            <strong>Start Date: </strong>
                                            2024-12-19
                                        </li>
                                        <li>
                                            <strong>End Date: </strong>
                                            2025-01-12
                                        </li>

                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" type="button" onclick="bookNow()">
                                    <i class="fas fa-check me-1"></i>
                                        Book Now
                                    </button>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Go Back
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Berat</h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/albania.jpg" alt="..." />
                                    <p>There will be some random info here...</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Price:</strong>
                                            100$
                                        </li>
                                        <li>
                                            <strong>Start Date: </strong>
                                            2024-12-19
                                        </li>
                                        <li>
                                            <strong>End Date: </strong>
                                            2025-01-12
                                        </li>

                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" type="button" onclick="bookNow()">
                                    <i class="fas fa-check me-1"></i>
                                        Book Now
                                    </button>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Go Back
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Berat</h2>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/albania.jpg" alt="..." />
                                    <p>There will be some random info here...</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Price:</strong>
                                            100$
                                        </li>
                                        <li>
                                            <strong>Start Date: </strong>
                                            2024-12-19
                                        </li>
                                        <li>
                                            <strong>End Date: </strong>
                                            2025-01-12
                                        </li>

                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" type="button" onclick="bookNow()">
                                    <i class="fas fa-check me-1"></i>
                                        Book Now
                                    </button>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Go Back
                                    </button>
                                    
                                </div>
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
