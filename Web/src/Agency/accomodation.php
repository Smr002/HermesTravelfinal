<?php
    include "isLoggedIn.php";
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accommodation</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="styles.css" rel="stylesheet">
</head>

<body>
<header class=" text-center bg-dark text-white py-5 mb-5">
  <div class="container">
    <!-- <img src="../Agency/assets/img/image.jpg" alt="Albania Landscape" class="img-fluid mb-4 mt-3"> -->
    <br>
    <br>
    <h1 class="display-4 ">Accommodation</h1>
  </div>
</header>


  <main class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <p class="lead">
          Explore the finest hotel accommodations across the Balkans with Hermes Travel! Leveraging our deep expertise in the region's hospitality offerings, we're committed to curating the perfect lodging options tailored to your travel preferences and financial considerations.

          Whether you're in search of charming guesthouses nestled amidst the picturesque landscapes of Northern Balkans, opulent beachfront resorts lining the Adriatic Sea, or sophisticated 5-star hotels in vibrant urban centers, Hermes Travel has an array of options to cater to your needs. Our diverse portfolio spans boutique-style hotels, business-friendly accommodations, and everything in between, ensuring a delightful and memorable stay.

          Take advantage of our competitive group rates, FIT rates, and comprehensive all-inclusive packages, crafted through our extensive partnerships and contracts throughout the Balkan Peninsula. Whether you're embarking on a solo journey, planning a family getaway, or organizing a corporate retreat, we're dedicated to simplifying your hotel booking process and enhancing your overall travel experience.

          Ready to embark on your Balkan escapade? Reach out to us today for further details or to secure your accommodation online. Whether you're an independent traveler or coordinating a group excursion, our seasoned team is poised to support you at every turn. </p>
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