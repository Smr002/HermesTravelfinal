<?php

include_once "isLoggedIn.php";

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if ($conn) {
    if (isset($_POST['Review'])) {
        $new_review = $_POST['Review1'];
        $username = $_SESSION['username'];

        // Prepare the statement
        $update = mysqli_prepare($conn, "UPDATE client SET Reviews = ? WHERE Username = ?");
        mysqli_stmt_bind_param($update, "ss", $new_review, $username);

        // Execute the statement
        if (mysqli_stmt_execute($update)) {
            echo "<script>alert('Thank you for your review!')</script>";
        } else {
            echo "<script>alert('Error')</script>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <style>
        /* Custom CSS for center-aligning text area */
        .form-group-textarea {
            text-align: center;
        }
    </style>
</head>
<body id="page-top">
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Leave a Review For Us</h2>
            </div>
            <form id="contactForm" method="post">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <textarea class="form-control form-group-textarea" id="message" placeholder="Your Message *" name="Review1" required></textarea>
                            <div class="invalid-feedback">A message is required.</div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-xl text-uppercase" name="Review">Send Review</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Footer-->
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
