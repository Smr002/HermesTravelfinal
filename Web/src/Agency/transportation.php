<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Transportation</title>
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
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      margin-top: 100px;
    }
  </style>
</head>
<body id="page-top">
    <?php  include "isLoggedIn.php"; ?>
    <header>
        <!-- Your header content -->
        <img src="assets/img/transportation.jpg" alt="Transportation Icon" class="center"/>
    </header>
    <section class="page-section">
        <div class="container">
            <p class="section-subheading text-muted">
                Explore the world with Hermes Travel and enjoy seamless transportation services as part of your unforgettable journey.<br><br>
                Our transportation options are designed to complement your travel experiences, whether you're heading to the airport, embarking on a city tour, or venturing into the countryside.<br><br>
                Discover convenience and comfort with our range of transportation services. From airport transfers to local sightseeing tours and group excursions, we offer reliable and efficient options to suit your travel needs. Our fleet includes a variety of vehicles, from cozy sedans and spacious SUVs to luxury coaches, ensuring a comfortable and enjoyable ride for every traveler.<br><br>
                At Hermes Travel, we understand that every journey is unique. That's why we provide personalized transportation solutions tailored to your preferences and itinerary. Whether you're traveling solo, with family, or as part of a group, we have the expertise and resources to make your transportation experience seamless and hassle-free.<br><br>
                Booking transportation with us is easy and convenient. Simply include your transportation preferences when planning your trip with us, and we'll take care of the rest. Our professional drivers and knowledgeable guides are dedicated to ensuring your safety, comfort, and satisfaction throughout your journey.<br><br>
                Experience the ease of travel with Hermes Travel and let us enhance your adventures with reliable transportation solutions. Contact us today to start planning your next unforgettable trip!
            </p>
        </div>
    </section>
    <!-- Contact Form Section -->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Request Form</h2>
            </div>
            <!-- Contact Form -->
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input -->
                            <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email input -->
                        <div class="form-group">
                            <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone input -->
                        <div class="form-group mb-md-0">
                            <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                    </div>
                    <!-- Message input -->
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <textarea class="form-control" id="message" placeholder="Transportation Details *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="text-center">
                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
  
</body>
</html>
