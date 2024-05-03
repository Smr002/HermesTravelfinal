<?php
 require_once("isLoggedIn.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agency - Other Services</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .service {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .service h3 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .service p {
            color: #666;
        }
        .visa-service {
            margin-top: -20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-4 text-center">Other Services</h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="service">
                    <h3>Travel Insurance</h3>
                    <p>Protect yourself against unexpected events with our comprehensive travel insurance options.</p><br>
                    <p>Contact for more info at <a href="tel:+1234567890">(355) 069 7040651</a></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service">
                    <h3>Airport Transfer Taxi</h3>
                    <p>Seamlessly transfer to and from the airport with our reliable airport transfer taxi services.</p><br>
                    <p>Call this number for taxi</p>
                    <p>Albania:<a href="tel:+1234567890">(355) 069 7040741</a></p>
                    <p>Kosovo:<a href="tel:+1234567890">(355) 069 7040601</a></p>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
                <div class="service">
                    <h3>Visa Assistance</h3>
                    <p>The Albanian Ministry of Foreign Affairs website usually provides up-to-date information on visa requirements and application processes. Travelers can find the necessary forms and guidelines<a href="https://punetejashtme.gov.al/en/"> here</a> </p>
                    <p>If travelers need further assistance or have specific inquiries, they can contact the Albanian embassy or consulate in their home country. Embassy officials can provide guidance on visa applications and any additional requirements.</p> 
                    <p> In certain cases, especially for complex visa situations or extended stays, seeking advice from immigration lawyers or consultants might be beneficial. They can provide personalized guidance tailored to the traveler's circumstances.</p>   
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service">
                    <h3>Car Rental Services</h3>
                    <p>If you enjoy to drive yourself here are some Car Rental options 😀<br><a href="https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwjnyen1j_KFAxXqOAYAHVqnCoYYABABGgJ3cw&ase=2&gclid=Cj0KCQjwltKxBhDMARIsAG8KnqX-4Bcb_RhbHdGphiMNMxGzzwBIch9WxT1G_adArvfZv3ngOunr8w0aAkSJEALw_wcB&ohost=www.google.com&cid=CAESVuD2rlZQB5c0r6uIJUi4YwWgJISeGdgSmMNJdIVRJYNerVv5P7V9NC3dsNROtR7g_ciOUvpWBxMST4Zv7JmVzf29u_p6ah7AJbp2WRFA9bVaCslN0AmM&sig=AOD64_2CJy1rZvX-whZU_sBXoEHtvjsf3w&q&nis=4&adurl&ved=2ahUKEwiC0OL1j_KFAxXicfEDHc-aBmsQ0Qx6BAgKEAE">Car rental at Tirana Airport</a><br><a href="https://www.tirana-airport.com/en/partners/3/Car-Rentals">Car rentals</a><br><a href="https://www.europcar.com/en/stations/albania/tirana-airport">Europcar</a> </p>

                </div>
            </div>

        </div>
        
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    require_once("footer.php");
?>