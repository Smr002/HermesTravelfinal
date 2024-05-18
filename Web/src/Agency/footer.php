<?php

include_once "isLoggedIn.php";

$conn = mysqli_connect("localhost", "root", "", "agencydb");
if($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        if(isset($_POST['Review1']) && isset($_POST['star-rating'])){
        
            $message = $_POST['Review1'];
            $rating = $_POST['star-rating'];
            $username = $_SESSION['username'];

            // Using prepared statement with placeholders
            $update = mysqli_prepare($conn, "UPDATE Client SET Reviews = ?, Rating = ? WHERE Username = ?");
            
            // Binding parameters to the prepared statement
            mysqli_stmt_bind_param($update, "sis", $message, $rating, $username);

            if (mysqli_stmt_execute($update)) {
                echo "<script>alert('Thank you for your review!')</script>";
            } else {
                echo "<script>alert('Error')</script>" . mysqli_error($conn);
            }
        }
        else{
            echo "<script>alert('Please enter the review or rating! Thank you!')</script>";
        }
    
    }
    mysqli_close($conn);
}
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
        .form-group-textarea {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-group-textarea textarea {
            text-align: center;
            width: 100%;
            /* Adjust the width to fill the container */
        }

        #contactForm {
            max-width: 1200px;
            /* Set a maximum width for the form */
            margin: auto;
            /* Center the form horizontally */
        }
        .container-wrapper1 {
            background-color: transparent;
    
            }

            .container1 {
            height: 10vh;
            }

            .rating-wrapper {
            align-self: left;
            box-shadow: 7px 7px 25px rgba(198, 206, 237, .7),
                        -7px -7px 35px rgba(255, 255, 255, .7),
                        inset 0px 0px 4px rgba(255, 255, 255, .9),
                        inset 7px 7px 15px rgba(198, 206, 237, .8); 
            border-radius: 5rem;
            display: inline-flex;
            direction: rtl !important;
            padding: 1.5rem 2.5rem;
            margin-left: auto;
            

            label {
                margin-left: 5%;
                margin-right: auto;
                color: #E1E6F6;
                cursor: pointer;
                display: inline-flex;
                font-size: 2.5rem;
                padding: 1rem .6rem;
                transition: color 0.5s;
            }
            
            svg {
                -webkit-text-fill-color: transparent;
                -webkit-filter: drop-shadow (4px 1px 6px rgba(198, 206, 237, 1));
                filter:drop-shadow(5px 1px 3px rgba(198, 206, 237, 1));
            }

            input {
                height: 100%;
                width: 100%;
            }
            
            input {
                display: none;
            }

            label:hover,
            label:hover ~ label,
            input:checked ~ label  {
                color: #34AC9E;
            }

            label:hover,
            label:hover ~ label,
            input:checked ~ label  {
                color: #34AC9E;
            }
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
            <div class="row justify-content-center"> <!-- Center the form horizontally -->
                <form id="contactForm" method="post" class="col-md-6">
                    <div class="form-group form-group-textarea">
                        <textarea class="form-control" id="message" placeholder="Your Message *" name="Review1"
                            required></textarea>
                        <div class="invalid-feedback">A message is required.</div>
                    </div>
                    <div><div class="container-wrapper1"> 
                        <br> 
  <div class="container1 d-flex align-items-center justify-content-center">
    <div class="row justify-content-center">    
      
      <div class="rating-wrapper">
        
        
            <input type="radio" id="5-star-rating" name="star-rating" value="5">
            <label for="5-star-rating" class="star-rating">
            <i class="fas fa-star d-inline-block"></i>
            </label>
            
            <!-- star 4 -->
            <input type="radio" id="4-star-rating" name="star-rating" value="4">
            <label for="4-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
            </label>
            
            <!-- star 3 -->
            <input type="radio" id="3-star-rating" name="star-rating" value="3">
            <label for="3-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
            </label>
            
            <!-- star 2 -->
            <input type="radio" id="2-star-rating" name="star-rating" value="2">
            <label for="2-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
            </label>
            
            <!-- star 1 -->
            <input type="radio" id="1-star-rating" name="star-rating" value="1">
            <label for="1-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
            </label>
            <br>
           
        
       </div>
      <br>
    </div>
  </div>
</div>
</div>
<br>
                    <div class="text-center">
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary btn-xl text-uppercase" name="Review">Send
                            Review</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Hermes Travel 2024</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    
</body>

</html>