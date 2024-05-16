<?php
    include "isLoggedIn.php";
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSINESS TRAVEL </title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <header class="text-center bg-dark text-white py-5 ">
        <div class="container" style="margin-top: 40px;">
            <!-- <img src="../Agency/assets/img/image.jpg" alt="Albania Landscape" class="img-fluid mb-4 mt-10"> -->
            <h1 class="display-4">BUSINESS TRAVEL ALBANIA</h1>
        </div>
    </header>

    <main class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <p class="lead">
                    Looking for top-notch business travel services in the Balkans? Look no further! As a proud member of Lufthansa City Center, we provide a comprehensive range of services designed to enhance your business travel experience while saving you money. Whether you're in need of transfers, hotel accommodations, restaurant savings, or car rentals, we've got you covered. Our expert team is dedicated to ensuring that your travel arrangements are seamless and hassle-free.
                    With access to a vast network of over 650 offices in more than 80 countries and a collective turnover of 5.5 billion Euro, we're able to offer unparalleled savings and benefits to our clients. From business travel planning to office facilities, translation services to lost luggage tracing, we're committed to meeting all of your travel needs.
                    Let us help you reduce expenses without compromising on quality. Contact us today to learn more about our business travel services in the Balkans. Simply complete the form below, and our friendly team will be in touch to assist you.
            </div>
        </div>
    </main>

    <footer class="bg-blue text-white text-center py-4 mt-5">
    <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {


include_once "footer.php";
} else {
include_once "footerContactUs.php";
}
?>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>